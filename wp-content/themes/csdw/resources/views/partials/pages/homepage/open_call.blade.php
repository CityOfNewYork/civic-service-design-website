@if($open_call)
  <div class="open_call-section section section-pink-30t chameleonic {{ $banner ? 'hasBanner' : '' }}" data-anchor="tools_section">
    <div class="container">

      <div class="open_call-wrapper">
        @foreach($open_call as $key => $item)

          <div class="open_call-item">

            <div class="open_call-item__content">
              <div class="open_call-item__title">{{ $item['title'] }}</div>

              @if($item['description'])
                <div class="open_call-item__description">
                  {!! $item['description'] !!}
                </div>
              @endif

              @if($item['button']['button_text'] && $item['button']['url'])
                <div class="button-wrapper">
                  <a href="{{ $item['button']['url'] }}"
                     {{ $item['button']['off-site'] ? 'target="_blank"' : '' }}
                     class="btn btn-red hover-state">
                    {{ $item['button']['button_text'] }}
                  </a>
                </div>
              @endif

            </div>

            <div class="open_call-item__thumbnail">
              <img
                src="{{ wp_get_attachment_image_url( $item['image'], 'Homepage OpenCall Listing' ) }}"
                alt="{{ $item['title'] }}"
                title="{{ $item['title'] }}"
                class="img img-width">
              {!! $item['icon'] !!}
            </div>

          </div>

        @endforeach
      </div>


    </div>
  </div>
@endif
