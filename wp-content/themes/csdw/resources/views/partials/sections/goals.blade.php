@if( $goals_section['goals'] )
  <section class="goals-section section section-pink-30t chameleonic" data-anchor="goals_section">
    <div class="container">

      <div class="section-header section-header--left">
        <h2 class="section-title">
          {{ $goals_section['section_title'] }}
        </h2>
        @if( $goals_section['section_description'] )
          <div class="section-description">
            {!! $goals_section['section_description'] !!}
          </div>
        @endif
      </div>

      <div class="row">
        @foreach( $goals_section['goals'] as $item )
          @include('partials.loop.goals-item', ['item' => $item])
        @endforeach
      </div>

    </div>
  </section>
@endif
