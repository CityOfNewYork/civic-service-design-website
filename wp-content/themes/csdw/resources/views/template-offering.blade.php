{{--
  Template Name: Offering
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp

    @include('partials.pages.single.offering.header', ['appointment_button' => $appointment_button])

    <div class="offering-content-section section-pink-30t chameleonic">

      @include('partials.pages.single.offering.testimonial', ['testimonial' => $testimonial])

      @include('partials.pages.single.offering.faq', ['faq_section' => $faq_section])

      @include('partials.pages.single.offering.numbers', ['numbers_section' => $numbers_section, 'appointment_button' => $appointment_button])

    </div>

  @include('partials.sections.related', [ 'related_section' => $related_section ])

  @endwhile
@endsection
