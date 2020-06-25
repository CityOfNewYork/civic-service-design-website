@if( $white_box_section )

  <section class="section-white_block section-white_block section section-pink-30t chameleonic">
    <div class="container">

      <div class="white_block">
        <div class="white_block__wrapper">
          @if( $white_box_section['section_title'] )
            <h2 class="white_block__title">
              {{ $white_box_section['section_title'] }}
            </h2>
          @endif

          @if( $white_box_section['content'] )
            <div class="white_block__content html-content">
              {!! $white_box_section['content'] !!}
            </div>
          @endif

          @if( $white_box_section['icon'] )
            <div class="white_block__circle">
              <img
                src="{{ wp_get_attachment_image_url( $white_box_section['icon'], 'full' ) }}"
                alt="{{ $white_box_section['section_title'] }}"
                title="{{ $white_box_section['section_title'] }}"
                class="img img-width style-svg"
              >
            </div>
          @endif
        </div>
      </div>

    </div>
  </section>

@endif
