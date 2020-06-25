@if( $testimonial )
  <div class="section testimonial-section">
    <div class="container">
      <div class="testimonial">
        <div class="testimonial__title">
          {{ $testimonial['text'] }}
        </div>

        @if( $testimonial['author'] )
          <div class="author">
            <div class="author__thumbnail">
              {!! wp_get_attachment_image( $testimonial['author']['photo'], 'thumbnail', false, ['class' => 'img', 'alt' => $testimonial['author']['name'], 'title' => $testimonial['author']['name']] ) !!}
            </div>
            <div class="author__meta">
              <div class="author__name">
                {{ $testimonial['author']['name'] }}
              </div>
              <div class="author__position">
                {!! $testimonial['author']['position'] !!}
              </div>
            </div>
          </div>
        @endif

      </div>
    </div>
  </div>
@endif

