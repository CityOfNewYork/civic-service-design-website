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
  </div>
</article>
