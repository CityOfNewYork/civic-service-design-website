<?php

namespace App\Traits;

trait PostArchiveHeaderTrait {

    /**
     * @return array
     */
    public function headerSettings(): array
    {
        if(is_home()) {
            $id = get_option('page_for_posts', true);
            $return = [
                'title' => get_the_title($id),
                'description' => get_field('description', $id)
            ];
        }
        return $return;
    }

}
