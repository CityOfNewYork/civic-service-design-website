<footer class="site-footer">

    <div class="site-footer__mobile">
      <a class="brand" href="{{ esc_url( 'https://www1.nyc.gov/site/opportunity/index.page' ) }}" target="_blank">
        <span class="screen-reader-text">NYC Opportunity</span>
        <img
          src="{{ wp_get_attachment_image_url( $footer_fields['footer_logo_mobile'], 'full' ) }}"
          alt="NYC Opportunity" title="NYC Opportunity"
          class="img style-svg"
        >
      </a>
      @if( $footer_fields['bottom_section']['address'] )
        <div class="item address">
          {!! $footer_fields['bottom_section']['address'] !!}
        </div>
      @endif
    </div>
    <div class="site-footer__row site-footer__row--top">

      <div class="site-footer-logo">
        <a class="brand" href="{{ esc_url( 'https://www1.nyc.gov/site/opportunity/index.page' ) }}" target="_blank">
          <span class="screen-reader-text">NYC Opportunity</span>
          <img
            src="{{ wp_get_attachment_image_url( $footer_fields['footer_logo'] ) }}"
            alt="NYC Opportunity" title="NYC Opportunity"
            class="img style-svg"
          >
        </a>
      </div>

      <div class="site-footer-menu">
        @php dynamic_sidebar('sidebar-footer') @endphp
      </div>

    </div>

    <div class="site-footer__row site-footer__row--middle">
      @if( $footer_fields['middle_section']['images'] )
        <div class="footer-middle-item footer-middle-item--text">
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
              class="img "
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
            <a href="{{ esc_url( $social_media['url'] ) }}"
               rel="noopener noreferrer"
               target="_blank"
               class="social-media-item">
              <span class="screen-reader-text">{{ $social_media['title'] }}</span>
              <img
                src="{{ wp_get_attachment_image_url( $social_media['icon'] ) }}"
                alt="{{ $social_media['title'] }}"
                title="{{ $social_media['title'] }}"
                class="img style-svg"
              >
            </a>
          @endforeach
        </div>
      @endif
    </div>

</footer>
