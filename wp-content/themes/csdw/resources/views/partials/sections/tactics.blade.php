@if( $tactics_section['tactics'] )
  <section class="tactics-section section section-pink-30t chameleonic" id="tactics_section" data-anchor="tactics_section">
    <div class="container">

      <div class="section-header section-header--left">
        <h2 class="section-title">
          {{ $tactics_section['section_title'] }}
        </h2>
        <div class="section-header__row">
          @if( $tactics_section['section_description'] )
            <div class="section-description">
              {!! $tactics_section['section_description'] !!}
            </div>
          @endif

          @if( !empty( $tactics_section['button'] ) && $tactics_section['button']['button_text'] )
            <div class="button-wrapper">
              <a href="{{ get_post_type_archive_link( 'tactics' ) }}" class="btn btn-red hover-state">
                <span>{{ $tactics_section['button']['button_text'] }}</span>
              </a>
            </div>
          @endif
        </div>
      </div>

      <div class="row loadMoreContainer"
           data-page="1"
           data-id="{{ get_the_ID() }}"
           data-post_type="{{ $tactics_section['tactics'][0]->post_type }}"
      >
        @foreach( $tactics_section['tactics'] as $tactic )
          @include('partials.loop.tactics-item', ['item' => $tactic])
        @endforeach
      </div>

      @if( $tactics_section['load_more'] )
        <div class="load-more-wrapper">
          <button class="btn btn-secondary loadMoreBtnACF">Load more</button>
        </div>
      @endif

    </div>
  </section>
@endif
