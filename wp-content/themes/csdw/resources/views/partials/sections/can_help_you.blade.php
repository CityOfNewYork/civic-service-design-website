@if( $can_help_you_section )

  <section class="section-can-help-you section section-pink-30t chameleonic">
    <div class="container">

      @if( $can_help_you_section['section_title'] )
        <div class="section-header">
          <div class="section-title">
            {{ $can_help_you_section['section_title'] }}
          </div>
        </div>
      @endif

      <div class="can-help-you-wrapper">
        <div class="row">
          @foreach( $can_help_you_section['items'] as $item )

            <div class="can-help-item">
              <div class="can-help-item__thumbnail">
                <img
                  src="{{ wp_get_attachment_image_url( $item['image'] ) }}"
                  alt="{{ $item['title'] }}"
                  title="{{ $item['title'] }}"
                  class="img img-width style-svg"
                >
              </div>

              <div class="can-help-item__title">
                {{ $item['title'] }}
              </div>


            </div>

          @endforeach
        </div>
      </div>

    </div>
  </section>

@endif
