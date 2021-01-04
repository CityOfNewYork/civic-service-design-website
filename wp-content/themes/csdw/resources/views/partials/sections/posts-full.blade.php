@if( $posts_section['posts'] )
  <section class="posts-full-section section section-pink chameleonic">
    <div class="container">

      <div class="section-header section-header--left">
        <h2 class="section-title">
          {{ $posts_section['section_title'] }}
        </h2>
        @if( $posts_section['section_description'] )
          <div class="section-header__row">
              <div class="section-description">
                {!! $posts_section['section_description'] !!}
              </div>
          </div>
        @endif
      </div>

      <div class="row loadMoreContainer"
           data-page="1"
           data-id="{{ get_the_ID() }}"
           data-post_type="{{ $posts_section['posts'][0]->post_type }}"
      >
        @foreach( $posts_section['posts'] as $item )
          <a href="{{ get_post_permalink( $item->ID ) }}" class="post-full-item hover-state">

            <span class="post-full-item__content">
              <span>
                  <span class="post-full-item__date">{{ get_the_date() }}</span>
                  <span class="post-full-item__title">{{ $item->post_title }}</span>
                  <span class="post-full-item__description">{{ App\theme_excerpt($item) }}</span>
              </span>
              <span class="post-full-item__cat">{{ App\post_categories_list( $item->ID ) }}</span>
            </span>

            @if( has_post_thumbnail( $item->ID ) )
              <span class="post-full-item__thumbnail">
                  <img class="post-full-item__img img img-width resize-img"
                       src="{{ get_the_post_thumbnail_url( $item->ID, 'long_large' ) }}"
                       alt="{{ $item->post_title }}"
                       title="{{ $item->post_title }}"
                       data-desktop="<?php echo get_the_post_thumbnail_url( $item->ID, 'long_large'); ?>"
                       data-mobile="<?php echo get_the_post_thumbnail_url( $item->ID, 'medium_large'); ?>"
                       loading="lazy"
                  >
              </span>
            @endif

          </a>
        @endforeach
      </div>

      @if( $posts_section['load_more'] )
        <div class="load-more-wrapper">
          <button class="btn btn-secondary loadMoreBtnACF">Load more</button>
        </div>
      @endif

    </div>
  </section>
@endif
