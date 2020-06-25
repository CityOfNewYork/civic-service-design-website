@if( $numbers_section )
  <div class="section-numbers section section-pink-30t chameleonic">
    <div class="container">

      <div class="row">

        @foreach( $numbers_section['items'] as $item )

          <div class="number-item">
            <div class="number-item__count counter" data-to="{{ $item['number'] }}">
              0
            </div>
            <div class="number-item__description">
              {{ $item['description'] }}
            </div>
          </div>

        @endforeach

      </div>

      @if( $numbers_section['content'] )
        <div class="section-description html-content">
          {!! $numbers_section['content'] !!}
        </div>
      @endif

      @if( $custom_button )
        <div class="button-wrapper">
          <a href="{{ esc_url( $custom_button['url'] ) }}"
             {!! App\off_site_attrs($custom_button['off-site']) !!}
             class="btn btn-red hover-state">
            <span>{{ $custom_button['button_text'] }}</span>
          </a>
        </div>
      @endif



    </div>
  </div>
@endif
