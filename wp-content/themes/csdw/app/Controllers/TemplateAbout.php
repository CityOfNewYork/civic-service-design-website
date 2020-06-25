<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateAbout extends Controller
{
    /**
     * @return array|null
     */
    public function whiteBoxSection(): ?array
    {
        $white_box_section = get_field( 'white_box_section' );

        return ( $white_box_section['content'] && $white_box_section['section_title'] ) ? $white_box_section : null;
    }

    /**
     * @return array|null
     */
    public function canHelpYouSection(): ?array
    {
        $can_help_you_section = get_field( 'can_help_you_section' );

        return ( $can_help_you_section['items'] ) ? $can_help_you_section : null;
    }

    /**
     * @return array|null
     */
    public function teamSection(): ?array
    {
        $team_section = get_field( 'team_section' );

        if( $team_section['members'] ) {
            foreach ( $team_section['members'] as &$member ) {
                if( $member['social_networks'] ) {
                    foreach ( $member['social_networks'] as &$network ) {
                        $network['icon'] = $this->addIconToSocialNetwork( $network['type'] );
                    }
                }
            }

            return $team_section;
        }

        return null;
    }

    /**
     * @return array|null
     */
    public function apprenticesSection(): ?array
    {
        $apprentices_section = get_field( 'apprentices_section' );

        if( $apprentices_section['apprentices'] ) {
            foreach ( $apprentices_section['apprentices'] as &$apprentices ) {
                if( $apprentices['social_networks'] ) {
                    foreach ( $apprentices['social_networks'] as &$network ) {
                        $network['icon'] = $this->addIconToSocialNetwork( $network['type'] );
                    }
                }
            }

            return $apprentices_section;
        }

        return null;
    }

    /**
     * @param string $networkType
     *
     * @return string|null
     */
    private function addIconToSocialNetwork( string $networkType ): ?string
    {
        $icon = null;
        switch ( strtolower( $networkType ) ) {
            case 'twitter':
                $icon = \App\asset_path('images/social_networks/Twitter.svg');
                break;
            case 'linkedin':
                $icon = \App\asset_path('images/social_networks/LinkedIn.svg');
                break;
        }

        return $icon;
    }

    /**
     * @return array|null
     */
    public function pastApprenticesSection(): ?array
    {
        $past_apprentices_section = get_field( 'past_apprentices_section' );

        return ( $past_apprentices_section['past_apprentices'] ) ? $past_apprentices_section : null;
    }
}
