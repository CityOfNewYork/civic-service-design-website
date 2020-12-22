<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{

    public function __construct()
    {
        /*
         * AJAX
         * */
        add_action( 'wp_ajax_loadmore',
            [$this, 'ajax_loadmore'] );
        add_action( 'wp_ajax_nopriv_loadmore',
            [$this, 'ajax_loadmore'] );

        add_action( 'wp_ajax_category_filter',
            [$this, 'ajax_categoryFilter'] );
        add_action( 'wp_ajax_nopriv_category_filter',
            [$this, 'ajax_categoryFilter'] );

        add_action( 'wp_ajax_search_t_t',
            [$this, 'ajax_search_t_t'] );
        add_action( 'wp_ajax_nopriv_search_t_t',
            [$this, 'ajax_search_t_t'] );

        /*
         * Pre Get Posts
         */
        add_action('pre_get_posts', function ($query) {
            if (!is_admin() && $query->is_main_query()) {
                if (is_home()) {
                    if (wp_is_mobile()) {
                        $query->set('posts_per_page', '3');
                    } else {
                        $query->set('posts_per_page', '8');
                    }
                } else if (is_post_type_archive('projects')) {
                    $query->set('orderby', 'meta_value date');
                    $query->set('meta_key', 'is_featured');
                    $query->set('order', 'DESC');

                    if (wp_is_mobile()) {
                        $query->set('posts_per_page', '3');
                    }
                } else if (is_post_type_archive(['tactics', 'tools', 'playlists'])) {
                    $query->set('posts_per_page', '-1');
                }
            }

            return $query;
        });

        /**
         * Enqueue Global Integrations
         *
         * @author NYC Opportunity
         */

        \App\enqueue_inline('global-site-tag');
    }

    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return sprintf(__('Sorry! We can’t find the page you’re looking for. Click the “<button type="button" class="icon-search" title="Search button"><img src="%s" class="search_icon" alt="Search Icon" title="Search Icon">Search</button>” above to find what you’re looking for.', 'sage'), \App\asset_path('images/buttons/Search_Icon.svg'));
        }
        return get_the_title();
    }

    public function footerFields()
    {
        return [
            'footer_logo'        => get_field( 'footer_logo', 'option' ),
            'footer_logo_mobile' => get_field( 'footer_logo_mobile', 'option' ),
            'middle_section'     => get_field( 'middle_section', 'option' ),
            'bottom_section'     => get_field( 'bottom_section', 'option' ),
        ];
    }

    public static function ajax_loadmore()
    {
        if( is_array( $_POST['query'] ) ) {
            $args = $_POST['query'];
        } else {
            $args = json_decode(stripslashes($_POST['query']), true);
        }

        $args['paged']       = $_POST['page'] + 1;
        $args['post_status'] = 'publish';

        $_query = new \WP_Query( $args );

        $post_type = ($args['post_type']) ? $args['post_type'] : 'post';
        if( $post_type == 'any' ) {
            $post_type = 'search';
        }
        if ($_query->have_posts()) {
            ob_start();
            while ($_query->have_posts()): $_query->the_post();

                echo \App\template( "partials/loop/{$post_type}-item" );

            endwhile;
            wp_reset_postdata();
            $html = ob_get_clean();

            $response = array(
                'html'         => $html
            );
            wp_send_json_success( $response );
        };
        wp_send_json_error();
    }

    public static function ajax_categoryFilter()
    {
        if( is_array( $_POST['query'] ) ) {
            $args = $_POST['query'];

        } else {
            $args = json_decode(stripslashes($_POST['query']), true);
        }

        $args['paged']       = 1;
        $args['post_status'] = 'publish';

        $post_type = ( !empty( $_POST['query']['post_type'] ) ) ? sanitize_text_field( $_POST['query']['post_type'] ) : 'post';

        $category_slug = sanitize_text_field($_POST['category_slug']);


        if( empty( $category_slug ) ) {
            wp_send_json_error(['message' => 'Category Tag Error']);
        }

        unset($args['tax_query']);
        if( $category_slug !== 'all_posts' ) {

            $args['tax_query'][0] = array(
                'taxonomy' => ( !empty( $_POST['query']['taxonomy'] ) ) ? sanitize_text_field( $_POST['query']['taxonomy'] ) : 'category',
                'field' => 'slug',
                'terms' => $category_slug,
            );

        }

        $_query = new \WP_Query( $args );

        if ($_query->have_posts()) {
            ob_start();
            $i=0;
            while ($_query->have_posts()): $_query->the_post();

                echo \App\template( "partials/pages/home/posts", ['i' => $i] );

                $i++;
            endwhile;
            wp_reset_postdata();

            $html = ob_get_clean();

            $response = array(
                'html'         => $html,
                'max_num_pages' => $_query->max_num_pages,
                'loadmore_params_posts' => $_query->query
            );

            wp_send_json_success( $response );
        }
        wp_send_json_error(['message' => 'No Posts']);
    }

    public static function ajax_search_t_t()
    {
        $errors = array();

        $nonce = isset($_POST['nonce_wp']) ? $_POST['nonce_wp'] : '';
        if ( ! wp_verify_nonce($nonce, 'SearchTandTNonce')) {
            wp_send_json_error(array('message' => 'Security Error'));
        }

        $search_string = isset($_POST['search']) ? sanitize_text_field($_POST['search']) : '';

        if(empty($search_string)) {
            $errors[] = 'Empty Search Field';
        }

        if(!empty($errors)) {
            wp_send_json_error($errors);
        }

        $args      = array(
            'numberposts' => -1,
            'post_type'   => array( 'phases', 'tactics', 'tools', 'goals', 'playlists' ),
            's'  => $search_string,
            'orderby' => 'post_type',
            'order'   => 'ASC'
        );

        $items = get_posts($args);
        $order = array('phases', 'tactics', 'tools', 'goals', 'playlists');

        usort($items, function ($a, $b) use ($order) {
            $pos_a = array_search($a->post_type, $order);
            $pos_b = array_search($b->post_type, $order);
            return $pos_a - $pos_b;
        });

        if (count($items) > 0) {
            ob_start();
            foreach ( $items as $item ) {
                $post_type = $item->post_type;
                echo \App\template( "partials/loop/{$post_type}-item", ['item' => $item] );
            }
            wp_reset_postdata();
            $html = ob_get_clean();

            $response = array(
                'html'         => $html
            );
            wp_send_json_success( $response );
        } else {
            wp_send_json_error(['Sorry, no results were found.']);
        }
    }

}
