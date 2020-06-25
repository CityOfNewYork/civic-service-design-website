@extends('layouts.app')

@section('content')
  @include('partials.pages.search.header')

  <div class="search-loop-section section-pink-30t chameleonic">
    <div class="container">
      @if (!have_posts())
        <div class="alert alert-warning">
          {{ __('Sorry, no results were found.', 'sage') }}
        </div>
        {!! get_search_form(false) !!}
      @else
        <div>
          @while(have_posts()) @php the_post() @endphp
            @include('partials.loop.search-item')
          @endwhile
        </div>
          {!! App\theme_load_more_button() !!}
      @endif
    </div>
  </div>
@endsection
