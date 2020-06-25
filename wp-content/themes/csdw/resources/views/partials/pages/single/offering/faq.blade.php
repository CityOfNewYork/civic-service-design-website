@if( $faq_section )

  <section class="section-white_block section section-pink-30t chameleonic">
    <div class="container">

      <div class="white_block">
        <div class="white_block__wrapper white_block__wrapper--faq">
          @if( $faq_section['section_title'] )
            <h2 class="white_block__title white_block__title--faq">
              {{ $faq_section['section_title'] }}
            </h2>
          @endif

          <div class="white_block__content">
            @foreach( $faq_section['items'] as $item )
              <div class="faq-item">
                <div class="faq-item__question">
                  {{ $item['question'] }}
                </div>
                <div class="faq-item__answer html-content">
                  {!! $item['answer'] !!}
                </div>
              </div>
            @endforeach
          </div>

        </div>
      </div>

    </div>
  </section>

@endif
