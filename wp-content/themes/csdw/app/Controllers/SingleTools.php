<?php

namespace App\Controllers;

use App\Traits\PostsHeaderTrait;
use App\Traits\RelatedSectionTrait;
use Sober\Controller\Controller;
use App\Traits\PostsSectionTrait;

class SingleTools extends Controller
{
    use PostsSectionTrait, PostsHeaderTrait, RelatedSectionTrait;

    /**
     * @return array|null
     */
    public function blocks(): ?array
    {
        $return = get_field( 'blocks' );
        return ( $return ) ? $return : null;
    }

    /**
     * @return array|null
     */
    public function sidebarItems(): ?array
    {
        $return = get_field( 'items' );
        return ( $return ) ? $return : null;
    }

}
