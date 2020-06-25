@extends('layouts.app')
@section('content')

  @include('partials.pages.archives.header', ['header_settings' => $header_settings])

  @php
    $i = 0;
    $first_small_post = true;
    global $wp_query;
    $count = $wp_query->post_count - 1;
  @endphp
  <div class="archive-loop-section section-pink-30t chameleonic">
    <div class="container">
      <div class="archive-wrapper">
        @while(have_posts()) @php the_post() @endphp

        @if(get_field( 'is_featured', get_the_ID() ))
          @include('partials.loop.projects-item-full')
        @else
          @if($first_small_post)
            <div class="row">
              @php
                $first_small_post = false;
              @endphp
              @endif

              @include('partials.loop.projects-item')

              @if($count == $i)
            </div>
          @endif
        @endif

        @php $i++ @endphp
        @endwhile
      </div>
      {!! App\theme_load_more_button() !!}
    </div>
  </div>

@endsection
