@if( $posts_section['posts'] )
  <section class="posts-section section section-pink-30t chameleonic" data-anchor="posts_section">
    <div class="container">

      <div class="section-header section-header--left">
        <h2 class="section-title">
          {{ $posts_section['section_title'] }}
        </h2>
        <div class="section-header__row">
          @if( $posts_section['section_description'] )
            <div class="section-description">
              {!! $posts_section['section_description'] !!}
            </div>
          @endif

        </div>
      </div>

      <div class="row loadMoreContainer"
           data-page="1"
           data-id="{{ get_the_ID() }}"
           data-post_type="{{ $posts_section['posts'][0]->post_type }}"
      >
        @foreach( $posts_section['posts'] as $item )
          @include('partials.loop.post-item', ['item' => $item])
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
