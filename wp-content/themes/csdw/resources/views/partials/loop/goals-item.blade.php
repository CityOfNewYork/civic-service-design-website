<a href="{{ get_the_permalink( $item ) }}" class="item goal-item hover-state">
  <span class="goal-item__tag">Goal</span>
  <span class="goal-item__title">{{ $item->post_title }}</span>
  <span class="goal-item__description">{{ App\theme_excerpt( $item ) }}</span>
</a>
