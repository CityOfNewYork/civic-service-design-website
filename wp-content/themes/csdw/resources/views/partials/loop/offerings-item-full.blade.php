@php
  $offering_date = get_field( 'offering_date' );
  $offering_date_array = [];
  if($offering_date) {
      $offering_date_array = explode( '-', $offering_date );
  }
  $custom_button = get_field( 'custom_button' );
@endphp
<article class="offering-item {{ $offering_date_array ? 'offering-item--with_date' : '' }}">

  @if(has_post_thumbnail())
    <div class="offering-item__thumbnail">
      @php the_post_thumbnail( 'full', array( 'class' => 'img img-width', 'alt' => get_the_title(), 'title' => get_the_title() ) ) @endphp
      @if( $offering_date_array )
        <div class="offering-item__date">
          <div class="offering-item__date_text">Coming Up!</div>
          <div class="offering-item__date_wrapper">
            <div class="offering-item__day">{{ $offering_date_array[0] }}</div>
            <div class="offering-item__month">{{ $offering_date_array[1] }}</div>
          </div>
        </div>
      @endif
    </div>
  @endif

  <div class="offering-item__meta">

    <header>
      <h3 class="offering-item__title">
        {{ get_the_title() }}
      </h3>

      <div class="offering-item__excerpt html-content">
        {{ App\theme_excerpt(get_the_ID(), 155) }}
      </div>

    </header>

    <div class="offering-item__bottom-row">
      <div class="button-wrapper">
        <a href="{{ get_the_permalink() }}" class="btn btn-white">Learn more <span
            class="screen-reader-text">{{ get_the_title() }}</span></a>
        @if( $custom_button && $custom_button['button_text'] && $custom_button['url'] )
          <a href="{{ esc_url( $custom_button['url'] ) }}"
             {!! App\off_site_attrs($custom_button['off-site']) !!}
             class="btn btn-red hover-state">
            <span>{{ $custom_button['button_text'] }}</span>
          </a>
        @endif
      </div>
    </div>
  </div>

</article>
