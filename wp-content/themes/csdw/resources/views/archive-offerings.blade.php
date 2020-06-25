@extends('layouts.app')
@section('content')

  @include('partials.pages.archives.header', ['header_settings' => $header_settings])

  <div class="archive-loop-section section-pink-30t chameleonic">
    <div class="container">
      <div class="archive-wrapper">
        @while(have_posts()) @php the_post() @endphp

          @include('partials.loop.offerings-item-full')

        @endwhile
      </div>
      {!! App\theme_load_more_button() !!}
    </div>
  </div>

@endsection
