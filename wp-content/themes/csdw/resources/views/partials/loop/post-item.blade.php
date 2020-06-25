@if(empty($item))
  @php $item = get_post(get_the_ID()) @endphp
@endif
<a href="{{ get_post_permalink( $item->ID ) }}" class="post-item hover-state">
  @if( has_post_thumbnail( $item->ID ) )
    <img class="post-item__img img img-width"
         src="{{ get_the_post_thumbnail_url( $item->ID, 'Posts Listing' ) }}"
         alt="{{ $item->post_title }}"
         title="{{ $item->post_title }}"
    >
  @endif
  <span class="post-item__content">
    <span>
        <span class="post-item__date">{{ get_the_date() }}</span>
        <span class="post-item__title">{{ $item->post_title }}</span>
    </span>
    <span class="post-item__cat">{{ App\post_categories_list( $item->ID ) }}</span>
  </span>
</a>
