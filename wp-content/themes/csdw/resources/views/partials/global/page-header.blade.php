<header class="page-header chameleonic">
  <h1 class="page-title">{!! App::title() !!}</h1>
  <div class="page-header__content html-content">
    @php the_content() @endphp
  </div>
</header>
<header class="search-header chameleonic">
  <div class="container">
    <h1 class="search-header__title">
      @if (!is_404())
        <span>Showing results for</span>
      @endif
      <span class="search-header__title--search_query"></span>
    </h1>
  </div>
</header>
