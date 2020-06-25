<?php

namespace App\Traits;

trait RelatedSectionTrait {

    /**
     * @return array|null
     */
    public function relatedSection(): ?array
    {
        $return = get_field( 'related_tactics_section' );
        return ( $return ) ? $return : null;
    }

}
