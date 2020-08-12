<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    global $wp_query;

    wp_enqueue_style('nyc-patterns', 'https://cdn.jsdelivr.net/gh/cityofnewyork/access-nyc-patterns@v0.1.0/dist/styles/site-default.css', false, null);
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);


    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);
    $translation_array = array( 'templateUrl' => get_stylesheet_directory_uri() );
//after wp_enqueue_script
    wp_localize_script( 'sage/main.js', 'path', $translation_array );
    wp_localize_script( 'sage/main.js', 'loadmore_params', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'posts' => json_encode( $wp_query->query_vars ),
        'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages
    ) );
    //wp_enqueue_script('sage/tutorial.js', get_template_directory_uri(). '/assets/libs/tutorial.js', ['jquery'], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add Editor Stylesheet using Gutenberg Support.
     * @source resources/editor-style.css
     * @author NYC Opportunity
     */
    add_theme_support('editor-styles');
    add_editor_style('editor-style.css');
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<div class="widget-wrapper">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="widget-title">',
        'after_title'   => '</div>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

/**
 * Setup Custom Post Types
 */
add_action('init', function () {
    $labels = array(
        'name' => __('Phases'),
        'singular_name' => __('Phase')
    );

    register_post_type('phases', array(
        'label' => __('Phase'),
        'description' => __('Phase Description'),
        'labels' => $labels,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 12,
        'menu_icon' => 'dashicons-networking',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post'
    ));

    $labels = array(
        'name' => __('Tactics'),
        'singular_name' => __('Tactic')
    );

    register_post_type('tactics', array(
        'label' => __('Tactic'),
        'description' => __('Tactic Description'),
        'labels' => $labels,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 13,
        'menu_icon' => 'dashicons-list-view',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post'
    ));

    $labels = array(
        'name' => __('Tools'),
        'singular_name' => __('Tool')
    );

    register_post_type('tools', array(
        'label' => __('Tool'),
        'description' => __('Tool Description'),
        'labels' => $labels,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 14,
        'menu_icon' => 'dashicons-hammer',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post'
    ));

    $labels = array(
        'name' => __('Goals'),
        'singular_name' => __('Goal')
    );

    register_post_type('goals', array(
        'label' => __('Goal'),
        'description' => __('Goal Description'),
        'labels' => $labels,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 15,
        'menu_icon' => 'dashicons-pressthis',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post'
    ));

    $labels = array(
        'name' => __('Playlists'),
        'singular_name' => __('Playlist')
    );

    register_post_type('playlists', array(
        'label' => __('Playlist'),
        'description' => __('Playlist Description'),
        'labels' => $labels,
        'show_in_rest' => true,
        'supports' => ['title'],
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 16,
        'menu_icon' => 'dashicons-controls-play',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post'
    ));

    $labels = array(
        'name' => __('Projects'),
        'singular_name' => __('Project')
    );

    register_post_type('projects', array(
        'label' => __('Project'),
        'description' => __('Project Description'),
        'labels' => $labels,
        'show_in_rest' => true,
        'supports' => ['title', 'thumbnail', 'excerpt'],
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 17,
        'menu_icon' => 'dashicons-images-alt2',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post'
    ));

    $labels = array(
        'name' => __('Offerings'),
        'singular_name' => __('Offering')
    );

    register_post_type('offerings', array(
        'label' => __('Offering'),
        'description' => __('Offering Description'),
        'labels' => $labels,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 18,
        'menu_icon' => 'dashicons-universal-access-alt',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post'
    ));
}, 0);

/**
 * Setup Image Sizes
 */
if ( function_exists( 'add_image_size' ) ) {
    add_image_size( 'Phase Listing',             149, 135, true );
    add_image_size( 'Phase Thumbnail',           46, 42, true );
    add_image_size( 'Tools Listing',             210, 178, true );
    add_image_size( 'Posts Listing',             340, 205, true );
    add_image_size( 'Posts Listing Full Type',   768, 339, true );
    add_image_size( 'Resources Listing',         354, 229, true );
    add_image_size( 'Tools Sidebar Listing',     409, 295, true );
    add_image_size( 'Homepage OpenCall Listing', 555, 555, true );
    add_image_size( 'Team Listing',              350, 350, true );
    add_image_size( 'Project Listing',           506, 311, true );
    add_image_size( 'How We Work Small',         409, 409, true );
    add_image_size( 'How We Work Large',         700, 409, true );
    add_image_size( 'Search Results',            284, 284, true );
}

/**
 * Setup ACF Options Pages
 */
if ( function_exists( 'acf_add_options_page' ) ) {

    $general_settings_parent = acf_add_options_page(array(
        'page_title' => 'Theme Settings',
        'menu_title' => 'Theme Settings',
        'redirect' => false,
        'icon_url' => 'dashicons-admin-generic',
    ));

    acf_add_options_sub_page(array(
        'title'      => 'Phases Settings',
        'parent'     => 'edit.php?post_type=phases',
        'capability' => 'edit_posts'
    ));

    acf_add_options_sub_page(array(
        'title'      => 'Goals Settings',
        'parent'     => 'edit.php?post_type=goals',
        'capability' => 'edit_posts'
    ));

    acf_add_options_sub_page(array(
        'title'      => 'Tactics Settings',
        'parent'     => 'edit.php?post_type=tactics',
        'capability' => 'edit_posts'
    ));

    acf_add_options_sub_page(array(
        'title'      => 'Tools Settings',
        'parent'     => 'edit.php?post_type=tools',
        'capability' => 'edit_posts'
    ));

    acf_add_options_sub_page(array(
        'title'      => 'Playlists Settings',
        'parent'     => 'edit.php?post_type=playlists',
        'capability' => 'edit_posts'
    ));

    acf_add_options_sub_page(array(
        'title'      => 'Projects Settings',
        'parent'     => 'edit.php?post_type=projects',
        'capability' => 'edit_posts'
    ));

    acf_add_options_sub_page(array(
        'title'      => 'Offerings Settings',
        'parent'     => 'edit.php?post_type=offerings',
        'capability' => 'edit_posts'
    ));

}

add_filter('get_search_form', function () {
    $form = '';
    echo template('partials.site-search-form');
    return $form;
});
