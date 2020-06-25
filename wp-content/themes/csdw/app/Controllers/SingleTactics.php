<?php

namespace App\Controllers;

use App\Traits\PostsHeaderTrait;
use App\Traits\RelatedSectionTrait;
use Sober\Controller\Controller;
use App\Traits\PostsSectionTrait;

class SingleTactics extends Controller
{
    use PostsSectionTrait, PostsHeaderTrait, RelatedSectionTrait;

    /**
     * @return object|null
     */
    public function parentPhase(): ?object
    {
        $return = get_field( 'parent_phase' );
        return ( $return ) ? $return : null;
    }

    /**
     * @return string|null
     */
    public function description(): ?string
    {
        $return = get_field( 'description' );
        return ( $return ) ? $return : null;
    }

    /**
     * @return array|null
     */
    public function steps(): ?array
    {
        $return = get_field( 'steps' );
        return ( $return ) ? $return : null;
    }

    /**
     * @return array|null
     */
    public function additionalResources(): ?array
    {
        $return = get_field( 'additional_resources' );
        return ( $return ) ? $return : null;
    }

}
