<article @php post_class() @endphp>
  @include('partials.global.post-header')

  <div class="main-content chameleonic bg-base-white text-navy-30s font-serif pt-0">
    <div class="container wp-content">
      @if (has_blocks())
        @php the_content() @endphp
      @else
        <div class="wp-block-group is-style-news-content">
          @php the_content() @endphp
        </div>
      @endif
    </div>

    @if ($related_section)
      <div class="container">
        <div class="section pb-4 tablet:pb-0">
          <hr class="border-solid border-b-2 border-grey-50t">
        </div>
      </div>
    @endif

    @include('partials.sections.related', [ 'related_section' => $related_section ])
  </div>
</article>
