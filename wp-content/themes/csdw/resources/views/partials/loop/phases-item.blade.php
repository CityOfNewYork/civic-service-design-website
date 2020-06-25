<div class="phase-item item">
  <div class="phase-item__tag">Phase</div>
  <a href="{{ get_post_permalink( $item->ID ) }}" class="phase-item__title">
    <span>{{ $item->post_title }}</span>
  </a>
  <div class="phase-item__image">
    <a href="{{ get_post_permalink( $item->ID ) }}">
      <img
        src="{{ get_the_post_thumbnail_url( $item->ID, 'Phase Listing' ) }}"
        alt="{{ $item->post_title }}"
        title="{{ $item->post_title }}"
        class="img"
      >
    </a>
  </div>
</div>
