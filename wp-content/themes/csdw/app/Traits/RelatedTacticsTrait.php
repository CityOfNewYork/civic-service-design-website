<?php

namespace App\Traits;

trait RelatedTacticsTrait {
  /**
   * @return array|null
   */
  public function relatedTacticsSection(): ?array {
    $return = get_field('related_tactics_section');

    return ($return) ? $return : null;
  }
}
