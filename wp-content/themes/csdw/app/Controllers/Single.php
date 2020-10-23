<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use App\Traits\PostsHeaderTrait;
use App\Traits\RelatedPostsTrait;

class Single extends Controller {
  use PostsHeaderTrait, RelatedPostsTrait;
}
