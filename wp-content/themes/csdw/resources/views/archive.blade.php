@extends('layouts.app')
@section('content')

  @include('partials.pages.archives.header-other', ['header_settings' => $header_settings])

  <div class="archive-loop-section archive-loop-section--other section-pink-30t chameleonic">
    <div class="container">
      <div class="archive-wrapper">
        <div class="row">
          @while(have_posts()) @php the_post() @endphp

            @include('partials.loop.'. get_post_type() .'-item')

          @endwhile
        </div>
      </div>
      {!! App\theme_load_more_button() !!}
    </div>
  </div>

@endsection
