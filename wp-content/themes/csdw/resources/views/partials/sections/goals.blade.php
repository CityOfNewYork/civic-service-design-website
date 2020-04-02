@if( $goals_section['goals'] )
  <section class="goals-section section section-pink-30t">
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
        @foreach( $goals_section['goals'] as $goal )
          <a href="{{ $goal['url'] }}" class="goal-item hover-state">
            <span class="goal-item__tag">Goal</span>
            <span class="goal-item__title">{{ $goal['title'] }}</span>
            <span class="goal-item__description">{{ $goal['description'] }}</span>
          </a>
        @endforeach
      </div>

    </div>
  </section>
@endif
