<div class="container chameleonic">

  <div class="search-block">
    <div class="search-block__form">
      <form role="search" method="get" class="search-form" id="ajaxSearchTT" action="{{ home_url( '/' ) }}">
        <input placeholder="Search our Tools + Tactics" type="text" class="field" name="s" autocomplete="off">
        @if( $quick_links )
          <div class="result-block">
            <div class="result-block__top">
              <div class="title">Quick Links</div>
              <a href="{{ get_post_type_archive_link( $quick_links[0]['post_type'] ) }}" class="link-all">See all</a>
            </div>
            <ul>
              @foreach( $quick_links as $link )
                <li><a href="{{ esc_url($link['link']) }}">{{ $link['title'] }}</a></li>
              @endforeach
            </ul>
          </div>
        @endif
        <input type="hidden" value="{{ wp_create_nonce('SearchTandTNonce') }}" name="nonce_field">
        <button type="submit" class="btn searchButton searchButton-section" title="Search button">
          <img src="{{ \App\asset_path('images/buttons/Search_Icon.svg') }}" alt="Search Icon">Search
        </button>
      </form>
      <div class="errors"></div>
    </div>
  </div>

</div>

@if( $section_anchors )
<div class="search-section chameleonic">

  <div class="container">
    <div class="row">

      @foreach( $section_anchors as $anchor )
        <div class="item">
          <a href="{{ $anchor['anchor_to'] }}" class="item__title">{{ $anchor['title'] }}</a>
          <div class="item__description">
            {{ $anchor['description'] }}
          </div>
        </div>
      @endforeach

    </div>
  </div>

</div>
@endif
