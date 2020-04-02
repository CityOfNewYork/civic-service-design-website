@if( $tools_section['tools'] )
  <section class="tools-section section section-pink-30t">
    <div class="container">

      <div class="section-header section-header--left">
        <h2 class="section-title">
          {{ $tools_section['section_title'] }}
        </h2>
        <div class="section-header__row">
          @if( $tools_section['section_description'] )
            <div class="section-description">
              {!! $tools_section['section_description'] !!}
            </div>
          @endif

          @if( $tools_section['button']['button_text'] )
            <div class="button-wrapper">
              <a href="{{ get_post_type_archive_link( 'tools' ) }}" class="btn btn-red hover-state">
                <span>{{ $tools_section['button']['button_text'] }}</span>
              </a>
            </div>
          @endif
        </div>
      </div>

      <div class="row loadMoreContainer"
           data-page="1"
           data-id="{{ get_the_ID() }}"
           data-post_type="{{ $tools_section['tools'][0]->post_type }}"
      >
        @foreach( $tools_section['tools'] as $tool )
          @include('partials.loop.tools-item', ['item' => $tool])
        @endforeach
      </div>

      @if( $tools_section['load_more'] )
        <div class="load-more-wrapper">
          <button class="btn btn-secondary loadMoreBtnACF">Load more</button>
        </div>
      @endif

    </div>
  </section>
@endif
