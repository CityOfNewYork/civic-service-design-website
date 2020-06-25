<?php

namespace App\Traits;

trait PostsSectionTrait {

    /**
     * @return array|null
     */
    public function postsSection(): ?array
    {
        $return = get_field( 'posts_section' );
        return ( $return ) ? $return : null;
    }

}
