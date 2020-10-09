<header class="post-header chameleonic bg-base-white text-navy-30s">
  <div class="container">
    <div class="grid">
      <div class="col-9 mx-auto">
        <h1 class="post-header__title text-left text-navy-30s mb-2">{!! get_the_title() !!}</h1>

        @if ($header_settings['header_subtitle']) <h2 class="font-serif font-normal mb-5">{{ $header_settings['header_subtitle'] }}</h2> @endif

        @include('partials/entry-meta')
      </div>
    </div>
  </div>
</header>
