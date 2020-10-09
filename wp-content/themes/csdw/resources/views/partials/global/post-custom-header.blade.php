<header class="post-header chameleonic" style="{{ $header_settings['header_color'] }}">
  <div class="container">
    <div class="row">
      <div class="post-header__meta">
        <div class="post-header__tag">{{ get_post_type_object(get_post_type())->labels->singular_name }}</div>
        <h1 class="post-header__title entry-title">{!! get_the_title() !!}</h1>
        <div class="post-header__content entry-content">
          @php the_content() @endphp
        </div>

        @include('partials.blocks.post_buttons', [ 'header_buttons' => $header_settings['header_buttons'] ] )

      </div>

      <div class="post-header__thumbnail">
        {{ the_post_thumbnail('full', ['class' => 'img']) }}
      </div>
    </div>



  </div>
</header>
