<form role="search" method="get" class="search-form" action="{{ home_url( '/' ) }}">
  <button type="submit" class="btn search-submit">
    <img src="{{ \App\asset_path('images/buttons/search_icon_blue.png') }}" alt="Search Icon" title="Search Icon">Search
    {{ esc_attr_x( 'Search', 'submit button' ) }}
  </button>
  <label>
    <span class="screen-reader-text">{{ _x( 'Search for:', 'label' ) }}</span>
    <input type="search" class="search-field" placeholder="{{ esc_attr_x( 'Search the Service Design Studio website', 'placeholder' ) }}" value="{{ get_search_query() }}" name="s" title="{{ esc_attr_x( 'Search for:', 'label' ) }}" />
  </label>
  <button type="button" class="btn searchButton searchButton-header close" ><img src="{{ \App\asset_path('images/header/close.png') }}" alt="Close" title="Close">{{ esc_attr_x( 'Close', 'submit button' ) }}</button>
</form>
