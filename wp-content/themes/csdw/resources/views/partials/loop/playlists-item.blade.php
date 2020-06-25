@if(empty($item))
  @php $item = get_post(get_the_ID()); @endphp
@endif
<a href="{{ get_the_permalink( $item ) }}" class="playlist-item item hover-state">
  <span class="playlist-item__tag">Playlist</span>
  <span class="playlist-item__title">{{ $item->post_title }}</span>
</a>
