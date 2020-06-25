<?php

namespace App\Controllers;

use App\Traits\PostArchiveHeaderTrait;
use Sober\Controller\Controller;

class Home extends Controller
{
    use PostArchiveHeaderTrait;

    public function categories()
    {
        $categories = get_categories([
            'taxonomy'     => 'category',
            'type'         => 'post',
            'hide_empty'   => 1,
        ]);

        $all_posts = new \stdClass;
        $all_posts->slug = 'all_posts';
        $all_posts->name = 'All Posts';
        array_unshift($categories, $all_posts);

        return $categories;
    }
}
