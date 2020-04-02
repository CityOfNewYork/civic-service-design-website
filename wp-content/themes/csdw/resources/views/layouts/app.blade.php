<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.global.head')
  <body @php body_class() @endphp>
    @php do_action('get_header') @endphp
    @include('partials.global.header')
    <div role="document">
      <div class="content">
        <main class="main">
          @yield('content')
        </main>
        @if (App\display_sidebar())
          <aside class="sidebar">
            @include('partials.global.sidebar')
          </aside>
        @endif
      </div>
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.global.footer')
    @php wp_footer() @endphp
  </body>
</html>
