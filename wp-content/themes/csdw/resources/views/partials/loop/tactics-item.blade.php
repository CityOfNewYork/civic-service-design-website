@if(empty($item))
  @php $item = get_post(get_the_ID()); @endphp
@endif
<a href="{{ get_post_permalink( $item->ID ) }}" class="tactic-item item hover-state">
  <span class="tactic-item__tag">Tactic</span>
  <span class="tactic-item__title">{{ $item->post_title }}</span>
</a>
