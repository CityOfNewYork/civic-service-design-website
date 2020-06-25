@php
  $date_start = get_field( 'date_start' );
  $date_end = get_field( 'date_end' );
  $excerpt = get_field('first_section_question');
  $icons = get_field('icons');
@endphp
<article class="project-item-full">

  @if(has_post_thumbnail())
    <div class="project-item-full__thumbnail">
      @php the_post_thumbnail( 'full', array( 'class' => 'img img-width', 'alt' => get_the_title(), 'title' => get_the_title() ) ) @endphp
    </div>
  @endif

  <div class="project-item-full__meta">

    <header>
      @if( $date_start && $date_end )
        <div class="project-item-full__date">
          <span>{{ $date_start }}</span> - <span> {{ $date_end }} </span>
        </div>
      @endif

      @if( $excerpt )
        <h3 class="project-item-full__excerpt">
          {{ $excerpt }}
        </h3>
      @endif
    </header>

    <div class="project-item-full__bottom-row">
      <div class="button-wrapper">
        <a href="{{ get_the_permalink() }}" class="btn btn-white">Learn more <span
            class="screen-reader-text">{{ get_the_title() }}</span></a>
      </div>

      @if( $icons )
        <div class="project-item-icons">
          @foreach( $icons as $icon )
            <div class="icon-item">
              {!! wp_get_attachment_image( $icon['icon'], 'full', false, array( 'class' => 'img style-svg', 'alt' => $icon['title'], 'title' => $icon['title'] ) ) !!}
            </div>
          @endforeach
        </div>
      @endif
    </div>
  </div>

</article>
