<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use App\Traits\RelatedPostsTrait;

class TemplateOffering extends Controller {
    use RelatedPostsTrait;

    /**
     * @return array|null
     */
    public function appointmentButton(): ?array
    {
        $appointment_button = get_field( 'appointment_button' );

        return ( $appointment_button['button_text'] && $appointment_button['url'] ) ? $appointment_button : null;
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
}
