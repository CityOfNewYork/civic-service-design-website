<header id="masthead" class="site-header">
  <div class="site-header-container">
    <div class="site-header-wrapper">

      <div class="site-header-branding">

        <div class="site-header-logo">
          <a class="brand" href="{{ home_url('/') }}">
            <span class="screen-reader-text">{{ get_bloginfo('name') }}</span>
            <img class="img" src="{{ \App\asset_path('images/header/CSD_Logo.svg') }}" alt="{{ get_bloginfo('name') }}" title="{{ get_bloginfo('name') }}">
          </a>
        </div>
        <div class="site-header-title">
         {{-- <a href="{{ esc_url( 'https://www1.nyc.gov/site/opportunity/index.page' ) }}" target="_blank">
            <span class="screen-reader-text">NYC Opportunity</span>--}}
            <img class="img style-svg" src="{{ \App\asset_path('images/svg/icon-logo-nyco-secondary.svg') }}" alt="NYC Opportunity" title="NYC Opportunity">
          {{--</a>--}}
        </div>

      </div>

      <button class="menu-toggle" aria-controls="menu-header-menu" aria-expanded="false" id="nav-icon">
        <?php esc_html_e( 'Primary Menu', 'csdw' ); ?>
        <span></span>
        <span></span>
        <span></span>
      </button>

      <nav class="site-header-nav">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'container' => false]) !!}
        @endif
        <button type="button" class="btn searchButton searchButton-header open" title="Search button">
          <img src="{{ \App\asset_path('images/buttons/Search_Icon.svg') }}" class="search_icon" alt="Search Icon" title="Search Icon">Search
        </button>
      </nav>

      <div class="search-form-header">
        {!! get_search_form( false )  !!}
      </div>
    </div>
    {!! App\theme_breadcrumb() !!}
  </div>

</header>
