{{--
  Template Name: Tool and Tactics
--}}

@extends('layouts.app')

@section('content')
  <article id="post-@php the_ID() @endphp" @php post_class() @endphp>
    @while(have_posts()) @php the_post() @endphp

      @include('partials.global.page-header')

      @include('partials.sections.search-bar')

      @include('partials.sections.phases', [ 'phases_section' => $phases_section ])

      @include('partials.sections.tactics', [ 'tactics_section' => $tactics_section ])

      @include('partials.sections.tools', [ 'tools_section' => $tools_section ])

      @include('partials.sections.goals', [ 'goals_section' => $goals_section ])
    @endwhile
  </article>
@endsection
