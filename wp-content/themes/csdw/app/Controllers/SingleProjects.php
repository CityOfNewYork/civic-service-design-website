<?php

namespace App\Controllers;

use App\Traits\PostsHeaderTrait;
use App\Traits\RelatedSectionTrait;
use Sober\Controller\Controller;
use App\Traits\PostsSectionTrait;

class SingleProjects extends Controller
{
    use RelatedSectionTrait;

    /**
     * @return array|null
     */
    public function icons(): ?array
    {
        $icons = get_field( 'icons' );
        return ( $icons ) ? $icons : null;
    }

    /**
     * @return array|null
     */
    public function dates(): ?array
    {
        $returnArray = [
            'date_start' => get_field( 'date_start' ),
            'date_end'   => get_field( 'date_end' ),
        ];
        return ( $returnArray['date_start'] && $returnArray['date_end'] ) ? $returnArray : null;
    }

    /**
     * @return string|null
     */
    public function firstSectionQuestion(): ?string
    {
        $first_section_question = get_field( 'first_section_question' );

        return ( $first_section_question ) ? $first_section_question : null;
    }

    /**
     * @return array|null
     */
    public function mainContent(): ?array
    {
        $main_content = get_field( 'main_content' );

        return ( $main_content ) ? $main_content : null;
    }

    /**
     * @return array|null
     */
    public function numbersSidebar(): ?array
    {
        $numbers_sidebar = get_field( 'numbers' );

        return ( $numbers_sidebar ) ? $numbers_sidebar : null;
    }

    /**
     * @return array|null
     */
    public function whatWeMadeSection(): ?array
    {
        $what_we_made_section = get_field( 'what_we_made_section' );

        return ( $what_we_made_section['items'] ) ? $what_we_made_section : null;
    }

    /**
     * @return array|null
     */
    public function howWeWorkedSection(): ?array
    {
        $how_we_worked_section = get_field( 'how_we_worked_section' );

        return ( $how_we_worked_section['items'] ) ? $how_we_worked_section : null;
    }

    /**
     * @return array|null
     */
    public function projectPartnersSection(): ?array
    {
        $project_partners_section = get_field( 'project_partners_section' );

        return ( $project_partners_section['text'] ) ? $project_partners_section : null;
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
