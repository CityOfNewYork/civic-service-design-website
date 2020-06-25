@if( $banner )
  <div class="banner" id="banner">
    <div class="container">

      <div class="banner__wrapper">

        <div class="banner__dismiss">
          <svg width="53" height="53" viewBox="0 0 53 53" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M39.5859 39.4143L13.5858 13.4143M13.5 39.4143L39.5 13.4143" stroke="white" stroke-width="4"/>
          </svg>
        </div>

        <div class="banner__title">
          {{ $banner['title'] }}
        </div>

        @if( $banner['button']['button_text'] && $banner['button']['url'] )
          <div class="banner__button">
            <a href="{{ $banner['button']['url'] }}"
               {{ $banner['button']['off-site'] ? 'target="_blank"' : '' }}
               class="btn btn-red hover-state">
              {{ $banner['button']['button_text'] }}
            </a>
          </div>
        @endif

      </div>

    </div>
  </div>
@endif
