<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment', 'embed'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    collect(['get_header', 'wp_head'])->each(function ($tag) {
        ob_start();
        do_action($tag);
        $output = ob_get_clean();
        remove_all_actions($tag);
        add_action($tag, function () use ($output) {
            echo $output;
        });
    });
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Render comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );

    $data = collect(get_body_class())->reduce(function ($data, $class) use ($comments_template) {
        return apply_filters("sage/template/{$class}/data", $data, $comments_template);
    }, []);

    $theme_template = locate_template(["views/{$comments_template}", $comments_template]);

    if ($theme_template) {
        echo template($theme_template, $data);
        return get_stylesheet_directory().'/index.php';
    }

    return $comments_template;
}, 100);

add_filter( 'nav_menu_item_args', function ( $args, $item, $depth ) {
    $args->after = '';
    if ( $args->menu->slug == 'header-menu' ) {
        if ( in_array( 'menu-item-has-children', $item->classes ) ) {
            $args->after = "<span class='toogle-sub-menu'><img class='img' src='" . \App\asset_path('images/header/down.svg') . "' alt='Arrow Down' title='Arrow Down' aria-hidden='true'></span>";
        }
    }
    return $args;
}, 99, 4 );

add_filter( 'wpseo_breadcrumb_links', function ( $links ) {
    $available_post_types = available_post_types_for_breadcrumb();

    if( is_singular($available_post_types) ) {
       /* $new_links = array_map(function ($item) {
            if( !array_key_exists( 'ptarchive', $item ) ) {
                return $item;
            }
        }, $links );*/
        $breadcrumbs_first_page = get_field( 'breadcrumbs_first_page_' . get_post_type(), 'options' );
        if( $breadcrumbs_first_page ) {
            $breadcrumb[] = [
                'url' => $breadcrumbs_first_page['url'],
                'text' => $breadcrumbs_first_page['title']
            ];
            array_splice( $links, 0, 0, $breadcrumb );
        }
    }

    return ( isset( $new_links ) ) ? $new_links : $links;
});

