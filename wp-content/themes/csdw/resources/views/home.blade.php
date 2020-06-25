@extends('layouts.app')
@section('content')

  @include('partials.pages.home.header', ['header_settings' => $header_settings])

  <div class="home-loop-section section-pink-30t chameleonic">
    <div class="container">

      @if( $categories )
        <form action="{{ home_url() }}" id="filter" class="form-filter">
          @foreach($categories as $key => $cat)
            <label class="form-filter__item" for="{{ $cat->slug }}">
              <input @php checked($key, 0) @endphp class="form-filter__input" type="radio" name="category_slug" value="{{ $cat->slug }}" id="{{ $cat->slug }}">
              <span class="form-filter__title">{{ $cat->name }}</span>
            </label>
          @endforeach
        </form>
      @endif

      <div class="row postsWrapper">
        @php
          $i=0;
        @endphp
        @while(have_posts()) @php the_post() @endphp

        @include('partials.pages.home.posts', ['i' => $i])

        @php $i++ @endphp
        @endwhile
      </div>
        {!! App\theme_load_more_button() !!}
    </div>
  </div>

@endsection
