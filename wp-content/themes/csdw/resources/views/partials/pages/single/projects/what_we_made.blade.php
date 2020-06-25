@if( $what_we_made_section )
  <section class="section-what-we-made section section-pink-30t chameleonic">
    <div class="container">

      <div class="section-header">
        <h2 class="section-title">
          {{ $what_we_made_section['section_title'] }}
        </h2>
      </div>

      <div class="row">
        @foreach( $what_we_made_section['items'] as $item )

          <div class="what-we-made-item">

            <div class="what-we-made-item__thumbnail">
              {!! wp_get_attachment_image( $item['image'], 'full', false, ['alt' => wp_strip_all_tags($item['content']), 'title' => wp_strip_all_tags($item['content'])] ) !!}
            </div>

            <div class="what-we-made-item__content html-content">
              {!! $item['content'] !!}
            </div>

          </div>

        @endforeach
      </div>

    </div>
  </section>
@endif
