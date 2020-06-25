<?php

namespace App\Traits;

trait TacticsSectionTrait {

    /**
     * @return array|null
     */
    public function tacticsSection(): ?array
    {
        $return = get_field( 'tactics_section' );
        return ( $return ) ? $return : null;
    }

}
