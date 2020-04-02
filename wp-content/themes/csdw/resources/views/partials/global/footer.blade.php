<footer class="site-footer">

    <div class="site-footer__row site-footer__row--top">

      <div class="site-footer-logo">
        <a class="brand" href="{{ home_url('/') }}">
          <img
            src="{{ wp_get_attachment_image_url( $footer_fields['footer_logo'] ) }}"
            alt="{{ $site_name }}"
            title="{{ $site_name }}"
            class="img"
          >
        </a>
      </div>

      <div class="site-footer-menu">
        @php dynamic_sidebar('sidebar-footer') @endphp
      </div>

    </div>

    <div class="site-footer__row site-footer__row--middle">
      @if( $footer_fields['middle_section']['images'] )
        <div class="footer-middle-item footer-middle-item-text">
          {!! $footer_fields['middle_section']['description'] !!}
        </div>
      @endif
      @if( $footer_fields['middle_section']['images'] )
        @foreach( $footer_fields['middle_section']['images'] as $image )
          <div class="footer-middle-item footer-middle-item--image">
            <img
              src="{{ wp_get_attachment_image_url( $image['image'] ) }}"
              alt="{{ $image['title'] }}"
              title="{{ $image['title'] }}"
              class="img"
            >
          </div>
        @endforeach
      @endif

    </div>

    <div class="site-footer__row site-footer__row--bottom">
      <div class="content-info">
        @if( $footer_fields['bottom_section']['address'] )
          <div class="item address">
            {!! $footer_fields['bottom_section']['address'] !!}
          </div>
        @endif
        @if( $footer_fields['bottom_section']['content'] )
            <div class="item content">
              {!! $footer_fields['bottom_section']['content'] !!}
            </div>
        @endif
      </div>
      @if( $footer_fields['bottom_section']['social_media'] )
        <div class="social-media">
          @foreach( $footer_fields['bottom_section']['social_media'] as $social_media )
            <a href="{{ esc_url( $social_media['url'] ) }}" class="social-media-item">
              <img
                src="{{ wp_get_attachment_image_url( $social_media['icon'] ) }}"
                alt="{{ $social_media['title'] }}"
                title="{{ $social_media['title'] }}"
                class="img"
              >
            </a>
          @endforeach
        </div>
      @endif
    </div>

</footer>
