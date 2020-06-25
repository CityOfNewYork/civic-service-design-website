@if(empty($item))
  @php $item = get_post(get_the_ID()) @endphp
@endif
<a href="{{ get_post_permalink( $item->ID ) }}" class="post-item post-item--large hover-state">
  @if( has_post_thumbnail( $item->ID ) )
    <img class="post-item__img post-item__img--large img img-width resize-img-991"
         src="{{ get_the_post_thumbnail_url( $item->ID, 'Team Listing' ) }}"
         alt="{{ $item->post_title }}"
         title="{{ $item->post_title }}"
         data-desktop="{{ get_the_post_thumbnail_url( $item->ID, 'Team Listing') }}"
         data-mobile="{{ get_the_post_thumbnail_url( $item->ID, 'Posts Listing' ) }}"
    >
  @endif
  <span class="post-item__content post-item__content--large">
    <span>
        <span class="post-item__date post-item__date--large">{{ get_the_date() }}</span>
        <span class="post-item__title post-item__title--large">{{ $item->post_title }}</span>
        <span class="post-item__excerpt">{{ App\theme_excerpt($item, 50) }}</span>
    </span>
    <span class="post-item__cat">{{ App\post_categories_list( $item->ID ) }}</span>
  </span>
</a>
