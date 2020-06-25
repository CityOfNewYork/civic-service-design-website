<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateToolsAndTactics extends Controller
{

    private $per_page = 6;

    public function __construct()
    {
        //TODO Change to special controller
        add_action( 'wp_ajax_pagination_items_acf',
            [$this, 'pagination_items_acf'] );
        add_action( 'wp_ajax_nopriv_pagination_items_acf',
            [$this, 'pagination_items_acf'] );
    }

    public function quickLinks() {

        $posts = get_field( 'quick_links' );

        $quick_links = [];
        if( $posts ) {
            foreach ( $posts as $item ) {
                $quick_links[] = [
                    'title' => $item->post_title,
                    'link'  => get_the_permalink( $item->ID ),
                    'post_type' => $item->post_type
                ];
            }
        }

        return ( $quick_links ) ? $quick_links : null;

    }

    public function sectionAnchors()
    {
        $section_anchors = get_field( 'section_anchors' );
        if ( $section_anchors ) {
            $section_anchors = array_map( function ( $anchor ) {
                $anchor['anchor_to'] = '#'.strtolower(str_replace(' ', '_', $anchor['anchor_to']));
                return $anchor;
            }, $section_anchors );
        }

        return $section_anchors;
    }

    public function phasesSection()
    {
        $phases_section = get_field( 'phases_section' );

        if ( $phases_section['show_section'] ) {
            return $phases_section;
        }

        return false;
    }

    public function tacticsSection()
    {
        $tactics_section = get_field( 'tactics_section' );

        if ( $tactics_section['show_section'] && $tactics_section['tactics'] ) {
            $tactics_section['load_more'] = false;

            if( count( $tactics_section['tactics'] ) > $this->per_page ) {
                $tactics_section['tactics']   = array_slice( $tactics_section['tactics'], 0, $this->per_page );
                $tactics_section['load_more'] = true;
            }


            return $tactics_section;
        }

        return false;
    }

    public function toolsSection()
    {
        $tools_section = get_field( 'tools_section' );

        if ( $tools_section['show_section'] && $tools_section['tools'] ) {
            $tools_section['load_more'] = false;

            if( count( $tools_section['tools'] ) > $this->per_page ) {
                $tools_section['tools']     = array_slice( $tools_section['tools'], 0, 6 );
                $tools_section['load_more'] = true;
            }

            return $tools_section;
        }

        return false;
    }

    public function goalsSection()
    {
        $goals_section = get_field( 'goals_section' );

        if ( $goals_section['show_section'] ) {
            return $goals_section;
        }

        return false;
    }

    public static function pagination_items_acf()
    {
        if ( ! wp_doing_ajax() ) {
            wp_send_json_error();
        }

        $post_type    = ( $_POST['post_type'] ) ? sanitize_text_field( $_POST['post_type'] ) : '';
        $next_page    = ( $_POST['next_page'] ) ? (int)$_POST['next_page'] : '';
        $post_id      = ( $_POST['post_type'] ) ? (int)$_POST['post_id'] : '';
        $items        = get_field( $post_type . '_section', $post_id )[$post_type];

        if ( ! empty( $next_page ) && ! empty( $items ) ) {
            $items_per_page = 3;
            $total_items    = count( $items );
            $total_pages    = ceil( ($total_items - 3) / $items_per_page );

            if ( $next_page > $total_pages ) {
                wp_send_json_error();
            }

            $starting_point = ( ( $next_page - 1 ) * $items_per_page + 3);
            $items          = array_slice( $items, $starting_point, $items_per_page );

            ob_start();
            foreach ( $items as $item ) {
                echo \App\template( "partials/loop/{$post_type}-item", [ 'item' => $item ] );
            }
            $html = ob_get_clean();

            $response = array(
                'total_pages'  => $total_pages,
                'current_page' => $next_page,
                'html'         => $html
            );
            wp_send_json_success( $response );
        }

        wp_send_json_error();
    }
}
