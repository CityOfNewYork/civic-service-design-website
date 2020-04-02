@if( $phases_section['phases'] )
  <section class="phases-section section section-pink-30t">
    <div class="container">

      <div class="section-header section-header--left">
        <h2 class="section-title">
          {{ $phases_section['section_title'] }}
        </h2>
        @if( $phases_section['section_description'] )
          <div class="section-description">
            {!! $phases_section['section_description'] !!}
          </div>
        @endif
      </div>

      <div class="row">
        @foreach( $phases_section['phases'] as $phase )
          <div class="phase-item">
            <div class="phase-item__tag">Phase</div>
            <a href="{{ get_post_permalink( $phase->ID ) }}" class="phase-item__title">{{ $phase->post_title }}</a>
            <div class="phase-item__image">
              <a href="{{ get_post_permalink( $phase->ID ) }}">
                <img
                  src="{{ get_the_post_thumbnail_url( $phase->ID, 'Phase Listing' ) }}"
                  alt="{{ $phase->post_title }}"
                  title="{{ $phase->post_title }}"
                  class="img"
                >
              </a>
            </div>
          </div>
        @endforeach
      </div>

    </div>
  </section>
@endif
