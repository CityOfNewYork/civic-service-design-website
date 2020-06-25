<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{
    /**
     * @return array|null
     */
    public function openCall(): ?array
    {
        $open_call = get_field( 'open_call' );

        $icon_1 = '<div class="open_call-item__icon icon_1">
                    <svg width="110" height="110" viewBox="0 0 110 110" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <circle cx="55" cy="55" r="55" fill="#F9A5DA"/>
                    </svg>
                   </div>';
        $icon_2 = '<div class="open_call-item__icon icon_2">
                    <svg width="215" height="139" viewBox="0 0 215 139" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <rect y="99.0383" width="218.481" height="44.0559" transform="rotate(-26.9558 0 99.0383)" fill="#FAA302"/>
                    </svg>
                   </div>';
        $icon_3 = '<div class="open_call-item__icon icon_3">
                    <svg width="119" height="105" viewBox="0 0 119 105" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M63.6409 5.0287L-2.13239e-05 94.5681L109.987 104.626L63.6409 5.0287Z" fill="#24325B"/>
                    </svg>
                   </div>';
        if( $open_call ) {
            foreach ( $open_call as $key => $item ) {
                if( $key === 0 ) {
                    $open_call[$key]['icon'] = $icon_1;
                } else if( $key === 1 ) {
                    $open_call[$key]['icon'] = $icon_2;
                } else if( $key === 2 ) {
                    $open_call[$key]['icon'] = $icon_3;
                } else if( $key % 3 == 0 ) {
                    $open_call[$key]['icon'] = $icon_1;
                } else if( ( $key - 2 ) % 3 == 0  ) {
                    $open_call[$key]['icon'] = $icon_3;
                } else if( ( $key - 1 ) % 3 == 0  ) {
                    $open_call[$key]['icon'] = $icon_2;
                }
            }
        }

        return ( $open_call ) ? $open_call : null;;
    }

    /**
     * @return array|null
     */
    public function banner(): ?array
    {
        $banner = get_field( 'banner' );
        return ( $banner['show_banner'] ) ? $banner : null;
    }
}
