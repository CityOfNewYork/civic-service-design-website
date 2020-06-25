{{--
  Template Name: Homepage
--}}

@extends('layouts.app')
@section('content')
  @while(have_posts()) @php the_post() @endphp

    @include('partials.pages.homepage.homepage-header')

    @include('partials.pages.homepage.open_call', ['open_call' => $open_call, 'banner' => $banner])

    @include('partials.pages.homepage.banner', ['banner' => $banner])

  @endwhile
@endsection
