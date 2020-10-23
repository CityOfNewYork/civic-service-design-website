<?php

namespace App\Traits;

trait RelatedPostsTrait {
  /**
   * @return array|null
   */
  public function relatedSection(): ?array {
    $related_posts = get_field('related_posts_section');

    return ($related_posts) ? $related_posts : null;
  }
}
