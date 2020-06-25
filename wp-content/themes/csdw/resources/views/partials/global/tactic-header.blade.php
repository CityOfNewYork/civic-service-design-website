<header class="post-header post-header--dark chameleonic" style="{{ $header_settings['header_color'] }}">
  <div class="container">
    <div class="row">
      <div class="post-header__meta">
        <div class="post-header__tag">{{ get_post_type_object(get_post_type())->labels->singular_name }}</div>
        <h1 class="post-header__title post-header__title--dark entry-title">{!! get_the_title() !!}</h1>
        <div class="post-header__content entry-content">
          @php the_content() @endphp
        </div>

        @include('partials.blocks.post_buttons', [ 'header_buttons' => $header_settings['header_buttons'] ] )

      </div>

      <div class="post-header__parent">
        @if( $parent_phase )
          <a href="{{ get_post_permalink( $parent_phase ) }}" class="parent-item">
            <span class="parent-item__image">
              <img
                src="{{ get_the_post_thumbnail_url( $parent_phase, 'Phase Thumbnail' ) }}"
                alt="{{ $parent_phase->post_title }}"
                title="{{ $parent_phase->post_title }}"
                class="img"
              >
            </span>
            <span class="parent-item__meta">
              <span class="parent-item__tag">
                {{ get_post_type_object($parent_phase->post_type)->labels->singular_name }}
              </span>
              <span class="parent-item__title">
                {{ $parent_phase->post_title }}
              </span>
            </span>
          </a>
        @endif

        @if( $description )

          <div class="post-header__description">
            {!! $description !!}
          </div>

        @endif

      </div>
    </div>

  </div>
</header>
