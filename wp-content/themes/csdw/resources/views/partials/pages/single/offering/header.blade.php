<header class="offering-header chameleonic">

  <div class="container">
    @if( has_post_thumbnail() )
      <div class="offering-header__thumbnail">
        @php the_post_thumbnail( 'full', ['class' => 'img img-width', 'alt' => get_the_title(), 'title' => get_the_title()]) @endphp
      </div>
    @endif

    <div class="offering-header__content-wrapper">

      <h1 class="offering-header__title">{{ get_the_title() }}</h1>
      <div class="offering-header__content html-content">
        @php the_content() @endphp
      </div>
      @if( $custom_button )
        <div class="button-wrapper">
          <a href="{{ esc_url( $custom_button['url'] ) }}"
             {!! App\off_site_attrs($custom_button['off-site']) !!}
             class="btn btn-red hover-state">
            <span>{{ $custom_button['button_text'] }}</span>
          </a>
        </div>
      @endif

    </div>


  </div>

</header>
