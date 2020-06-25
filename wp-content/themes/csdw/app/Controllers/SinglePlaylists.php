<?php

namespace App\Controllers;

use App\Traits\PostsHeaderTrait;
use Sober\Controller\Controller;
use App\Traits\TacticsSectionTrait;
use App\Traits\PostsSectionTrait;

class SinglePlaylists extends Controller
{
    use TacticsSectionTrait, PostsSectionTrait, PostsHeaderTrait;

}
