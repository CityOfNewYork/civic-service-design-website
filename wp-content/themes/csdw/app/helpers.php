<?php

namespace App;

use Roots\Sage\Container;

/**
 * Get the sage container.
 *
 * @param string $abstract
 * @param array  $parameters
 * @param Container $container
 * @return Container|mixed
 */
function sage($abstract = null, $parameters = [], Container $container = null)
{
    $container = $container ?: Container::getInstance();
    if (!$abstract) {
        return $container;
    }
    return $container->bound($abstract)
        ? $container->makeWith($abstract, $parameters)
        : $container->makeWith("sage.{$abstract}", $parameters);
}

/**
 * Get / set the specified configuration value.
 *
 * If an array is passed as the key, we will assume you want to set an array of values.
 *
 * @param array|string $key
 * @param mixed $default
 * @return mixed|\Roots\Sage\Config
 * @copyright Taylor Otwell
 * @link https://github.com/laravel/framework/blob/c0970285/src/Illuminate/Foundation/helpers.php#L254-L265
 */
function config($key = null, $default = null)
{
    if (is_null($key)) {
        return sage('config');
    }
    if (is_array($key)) {
        return sage('config')->set($key);
    }
    return sage('config')->get($key, $default);
}

/**
 * @param string $file
 * @param array $data
 * @return string
 */
function template($file, $data = [])
{
    return sage('blade')->render($file, $data);
}

/**
 * Retrieve path to a compiled blade view
 * @param $file
 * @param array $data
 * @return string
 */
function template_path($file, $data = [])
{
    return sage('blade')->compiledPath($file, $data);
}

/**
 * @param $asset
 * @return string
 */
function asset_path($asset)
{
    return sage('assets')->getUri($asset);
}

/**
 * @param string|string[] $templates Possible template files
 * @return array
 */
function filter_templates($templates)
{
    $paths = apply_filters('sage/filter_templates/paths', [
        'views',
        'resources/views'
    ]);
    $paths_pattern = "#^(" . implode('|', $paths) . ")/#";

    return collect($templates)
        ->map(function ($template) use ($paths_pattern) {
            /** Remove .blade.php/.blade/.php from template names */
            $template = preg_replace('#\.(blade\.?)?(php)?$#', '', ltrim($template));

            /** Remove partial $paths from the beginning of template names */
            if (strpos($template, '/')) {
                $template = preg_replace($paths_pattern, '', $template);
            }

            return $template;
        })
        ->flatMap(function ($template) use ($paths) {
            return collect($paths)
                ->flatMap(function ($path) use ($template) {
                    return [
                        "{$path}/{$template}.blade.php",
                        "{$path}/{$template}.php",
                    ];
                })
                ->concat([
                    "{$template}.blade.php",
                    "{$template}.php",
                ]);
        })
        ->filter()
        ->unique()
        ->all();
}

/**
 * @param string|string[] $templates Relative path to possible template files
 * @return string Location of the template
 */
function locate_template($templates)
{
    return \locate_template(filter_templates($templates));
}

/**
 * Determine whether to show the sidebar
 * @return bool
 */
function display_sidebar()
{
    static $display;
    isset($display) || $display = apply_filters('sage/display_sidebar', false);
    return $display;
}

function theme_excerpt( $post, $lenght = 80, $more = '' )
{
    $_post = get_post( $post );
    if( !empty( trim($_post->post_excerpt) )  ) {
        return wp_strip_all_tags( $_post->post_excerpt );
    } else {
        $post_content = wp_strip_all_tags( $_post->post_content, true );
        if( strlen($post_content) < $lenght ) {
            return $post_content;
        }
        $key = strpos( $post_content, ' ', $lenght );
        return mb_strimwidth( $post_content, 0, $key ).$more;
    }
}

function available_post_types_for_breadcrumb() {
    return $available_post_types = [
        'phases',
        'tactics',
        'goals',
        'tools',
        'playlists'
    ];
}

function theme_breadcrumb() {
    if ( function_exists('yoast_breadcrumb') ) {
        $available_post_types = available_post_types_for_breadcrumb();

        if( is_singular($available_post_types) ) {
            return yoast_breadcrumb( '<div id="breadcrumbs">','</p>', false );
        }
    }
    return false;
};

function post_categories_list( $post_id ) {
    $categories_list = wp_strip_all_tags( get_the_category_list( esc_html__( ', ', 'CSDW' ), '', $post_id ) );
    if ( $categories_list ) {
        return $categories_list;
    }
    return false;
}

function get_previous_url_for_breadcrumbs() {
    $referer = $_SERVER['HTTP_REFERER'];
    return false;
}


function off_site_attrs( $bool ) {
    $return = false;

    if( $bool ) {
        return "target='_blank' rel='noopener noreferrer'";
    }

    return $return;
}

function theme_load_more_button() {
    if ( $GLOBALS['wp_query']->max_num_pages > 1 ) {
        ob_start();
        ?>
        <div class="btn-wrapper btn-loadmore">
            <button class="btnLoadmore btn btn-secondary"><span>Load more</span></button>
        </div>
        <?php
        return ob_get_clean();
    }
    return false;
}

function post_type_singular_name($post_type) {
    if ($post_type == 'post') {
        return "News";
    }

    $postType = get_post_type_object($post_type);
    if ($postType) {
        return esc_html($postType->labels->singular_name);
    }

    return false;
}
