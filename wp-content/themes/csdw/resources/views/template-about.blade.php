{{--
  Template Name: About
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp

    @include('partials.pages.about.about-header')

    <div class="about-content-section section-pink-30t chameleonic">

      @if( has_post_thumbnail() )
        <div class="container">
          <div class="post-thumbnail">
            <img
              src="{{ get_the_post_thumbnail_url( get_the_ID(), 'full' ) }}"
              alt="{{ get_the_title() }}"
              title="{{ get_the_title() }}"
              class="img img-width"
            >
          </div>
        </div>
      @endif

      @include('partials.sections.white_block', ['white_box_section' => $white_box_section])

      @include('partials.sections.can_help_you', ['can_help_you_section' => $can_help_you_section])

      @include('partials.sections.team', ['team_section' => $team_section])

      @include('partials.sections.apprentice_team', ['apprentices_section' => $apprentices_section])

    </div>

  @endwhile
@endsection
