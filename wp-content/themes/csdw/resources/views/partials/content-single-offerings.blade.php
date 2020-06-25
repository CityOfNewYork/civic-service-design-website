<article @php post_class() @endphp>

  @include('partials.pages.single.offering.header', ['custom_button' => $custom_button])

  <div class="offering-content-section section-pink-30t chameleonic">

    @include('partials.pages.single.offering.testimonial', ['testimonial' => $testimonial])

    @include('partials.pages.single.offering.faq', ['faq_section' => $faq_section])

    @include('partials.pages.single.offering.numbers', ['numbers_section' => $numbers_section, 'custom_button' => $custom_button])

  </div>

  @include('partials.sections.related', [ 'related_section' => $related_section ])

</article>
