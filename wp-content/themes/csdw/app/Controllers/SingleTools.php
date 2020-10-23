<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use App\Traits\PostsHeaderTrait;
use App\Traits\PostsSectionTrait;
use App\Traits\RelatedTacticsTrait;

class SingleTools extends Controller
{
    use PostsSectionTrait, PostsHeaderTrait, RelatedTacticsTrait;

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
