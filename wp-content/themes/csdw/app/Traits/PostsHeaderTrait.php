<?php

namespace App\Traits;

trait PostsHeaderTrait {

    /**
     * @return array
     */
    public function headerSettings(): array
    {
        $return = [
            'header_color' => null,
            'header_buttons' => null
        ];
        $header_color = get_field( 'header_color_' . get_post_type(), 'options' );
        if( $header_color ) {
            $return['header_color'] = "background-color: {$header_color}";
        }

        $header_buttons = get_field( 'header_buttons_' . get_post_type(), 'options' );
        if( $header_buttons ) {
            $return['header_buttons'] = [];
            foreach ( $header_buttons as &$button ) {
                $return['header_buttons'][] = array_map('strtolower', $button);
            }
        }

        return $return;
    }

}
