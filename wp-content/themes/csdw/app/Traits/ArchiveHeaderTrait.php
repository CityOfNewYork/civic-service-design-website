<?php

namespace App\Traits;

trait ArchiveHeaderTrait {

    /**
     * @return array
     */
    public function headerSettings(): array
    {
        $title = get_field( 'archive_title_' . get_post_type(), 'options' );
        if( empty( $title ) ) {
            $title = post_type_archive_title( '', false );
        }
        return array(
            'title' => $title,
            'description' => get_field( 'archive_description_' . get_post_type(), 'options' )
        );
    }

}
