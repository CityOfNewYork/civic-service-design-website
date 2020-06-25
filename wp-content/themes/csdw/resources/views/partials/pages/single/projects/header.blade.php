<header class="project-single-header chameleonic">

  <div class="container">
    @if( has_post_thumbnail() )
      <div class="project-single-header__thumbnail">
        @php the_post_thumbnail( 'full', ['class' => 'img img-width', 'alt' => get_the_title(), 'title' => get_the_title()]) @endphp
      </div>
    @endif

    <div class="project-single-header__content-wrapper">
      @if( $dates )
        <div class="project-single-header__dates">
          <span>{{ $dates['date_start'] }} - {{ $dates['date_end'] }}</span>
        </div>
      @endif

      <h1 class="project-single-header__title">{{ get_the_title() }}</h1>

      @if( $icons )
        <div class="project-item-icons">
          @foreach( $icons as $icon )
            <div class="icon-item">
              {!! wp_get_attachment_image( $icon['icon'], 'full', false, array( 'class' => 'img style-svg', 'alt' => $icon['title'], 'title' => $icon['title'] ) ) !!}
            </div>
          @endforeach
        </div>
      @endif

    </div>

  </div>

</header>
