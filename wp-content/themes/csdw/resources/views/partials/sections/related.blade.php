@if( $related_section['related'] )
  <section class="related-section section chameleonic">
    <div class="container">
      @if($related_section['section_title'])
        <div class="section-header">
          <div class="section-title">
            {{ $related_section['section_title'] }}
          </div>
        </div>
      @endif
      <div class="row">
        @foreach( $related_section['related'] as $item )
          @include('partials.loop.'.$item->post_type.'-item', ['item' => $item])
        @endforeach
      </div>
    </div>
  </section>
@endif
