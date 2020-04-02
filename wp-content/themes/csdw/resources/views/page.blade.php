@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.global.page-header')
    @include('partials.content-page')
  @endwhile
@endsection
