@if(empty($item))
  @php $item = get_post(get_the_ID()); @endphp
@endif
<a href="{{ get_post_permalink( $item->ID ) }}" class="tool-item item hover-state">
  <span class="tool-item__tag">Tool</span>
  <span class="tool-item__title">{{ $item->post_title }}</span>
  @if( has_post_thumbnail( $item->ID ) )
    <img class="tool-item__img img"
         src="{{ get_the_post_thumbnail_url( $item->ID, 'medium' ) }}" loading="lazy">
  @endif
</a>
