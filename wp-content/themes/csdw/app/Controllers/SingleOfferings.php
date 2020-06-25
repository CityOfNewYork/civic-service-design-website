<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SingleOfferings extends Controller
{
    /**
     * @return array|null
     */
    public function customButton(): ?array
    {
        $custom_button = get_field( 'custom_button' );

        return ( $custom_button['button_text'] && $custom_button['url'] ) ? $custom_button : null;
    }

    /**
     * @return array|null
     */
    public function testimonial(): ?array
    {
        $testimonial = get_field( 'testimonial' );

        if( empty( $testimonial['author']['photo'] ) || empty( $testimonial['author']['name'] ) ) {
            $testimonial['author'] = null;
        }

        return ( $testimonial['text'] && $testimonial['author'] ) ? $testimonial : null;
    }

    /**
     * @return array|null
     */
    public function faqSection(): ?array
    {
        $faq_section = get_field( 'faq_section' );

        return ( $faq_section['items'] ) ? $faq_section : null;
    }

    /**
     * @return array|null
     */
    public function numbersSection(): ?array
    {
        $numbers_section = get_field( 'numbers_section' );

        return ( $numbers_section['items'] ) ? $numbers_section : null;
    }

    /**
     * @return array|null
     */
    public function relatedSection(): ?array
    {
        $related_posts = get_field( 'related_posts_section' );

        return ( $related_posts ) ? $related_posts : null;
    }
}
