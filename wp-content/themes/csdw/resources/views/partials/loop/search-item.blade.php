<article @php post_class('search-item') @endphp>
  <div class="search-item__content">
    <header class="search-item__header">
      <div class="search-item__post_type">
        {{ App\post_type_singular_name(get_post_type()) }}
      </div>
      <h2 class="search-item__title entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
    </header>
    @if( get_post_type() != 'projects' )
      <div class="entry-summary search-item__excerpt">
        {{ App\theme_excerpt(get_the_ID(), 350, '...') }}
      </div>

    @else
      <div class="entry-summary search-item__excerpt">
        {{ get_field('first_section_question') }}
      </div>
      @if( $icons = get_field('icons') )
        <div class="project-item-icons">

          @foreach( $icons as $icon )
            <div class="icon-item">
              {!! wp_get_attachment_image( $icon['icon'], 'full', false, array( 'class' => 'img style-svg', 'alt' => $icon['title'], 'title' => $icon['title'] ) ) !!}
            </div>
          @endforeach

        </div>
      @endif
    @endif

    <div class="button-wrapper">
      <a href="#" class="btn btn-red hover-state">Read More <span class="screen-reader-text"> {!! get_the_title() !!}</span></a>
    </div>

  </div>
  <div class="search-item__thumbnail">
    @if(has_post_thumbnail())
      <img src="{{ get_the_post_thumbnail_url( get_the_ID(), 'square_small' ) }}"
           alt="{{ get_the_title() }}"
           title="{{ get_the_title() }}"
           data-desktop="{{ get_the_post_thumbnail_url( get_the_ID(), 'square_small') }}"
           data-mobile="{{ get_the_post_thumbnail_url( get_the_ID(), 'large' ) }}"
           class="img resize-img-768"
           loading="lazy"
      >
    @endif
  </div>
</article>
