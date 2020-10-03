@if( $phases_section['phases'] )
  <section class="phases-section section section-pink-30t chameleonic" id="phases_section" data-anchor="phases_section">
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
        @foreach( $phases_section['phases'] as $item )
          @include('partials.loop.phases-item', ['item' => $item])
        @endforeach
      </div>

    </div>
  </section>
@endif
