@if( $project_partners_section )
  <section class="section-project_partners_section section section-pink-30t chameleonic">
    <div class="container">
      <div class="project_partners_section__text">
        {!! $project_partners_section['text'] !!}
      </div>

      @if( $project_partners_section['author'] )
        <div class="project_partners_section__author">
          {{ $project_partners_section['author'] }}
        </div>
      @endif
    </div>
  </section>
@endif
