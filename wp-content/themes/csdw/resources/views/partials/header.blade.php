<header id="masthead" class="site-header">
  <div class="site-header-container">

    <div class="site-header-branding">

      <div class="site-header-logo">
        <a class="brand" href="{{ home_url('/') }}">
          <img src="{{ \App\asset_path('images/header/CSD Logo.png') }}" alt="">
        </a>
      </div>
      <div class="site-header-title">

        <img src="{{ \App\asset_path('images/header/NYCOpportunity_title.png') }}" alt="">
      </div>

    </div>

    <nav class="site-header-nav">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
        <button type="button" class="btn searchButton searchButton-header" title="Search button">
          Search
        </button>
    </nav>

  </div>
  <div class="container">

  </div>
</header>
