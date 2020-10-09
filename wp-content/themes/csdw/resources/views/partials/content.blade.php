<article @php post_class() @endphp>
  @include('partials.global.post-header')

  <div class="main-content chameleonic wp-content bg-base-white text-navy-30s font-serif pt-0">
    <div class="container">
      @php the_content() @endphp
    </div>
  </div>
</article>
