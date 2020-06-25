@if( $apprentices_section || $past_apprentices_section )
  <section class="section-apprentices section section-pink-30t chameleonic">

    @if( $apprentices_section )
      <div class="container">
        @if( $apprentices_section['section_title'] )
          <div class="section-header">
            <h2 class="section-title">
              {{ $apprentices_section['section_title'] }}
            </h2>
            @if( $apprentices_section['description'] )
              <div class="section-description html-content">
                {!! $apprentices_section['description'] !!}
              </div>
            @endif
          </div>
        @endif
        <div class="row">
          @foreach( $apprentices_section['apprentices'] as $apprentice )
            <article class="apprentice">
              <div class="apprentice__thumbnail">
                <img src="{{ wp_get_attachment_image_url( $apprentice['photo'], 'Team Listing' ) }}"
                     alt="{{ $apprentice['full_name'] }}"
                     title="{{ $apprentice['full_name'] }}"
                     class="img">
              </div>
              <div class="apprentice__info">
                <header class="apprentice__name">
                  {{ $apprentice['full_name'] }}
                </header>
                <div class="apprentice__position">
                  {{ $apprentice['position'] }}
                </div>
                @if( $apprentice['social_networks'] )
                  <div class="apprentice__social-networks">
                    @foreach( $apprentice['social_networks'] as $network )
                      <div class="apprentice__social-network-item">
                        <a href="{{ esc_url( $network['link'] ) }}"
                           target="_blank" rel="noopener noreferrer">
                          <span>{{ $apprentice['full_name'] . ' ' . $network['type'] }}</span>
                          <img src="{{ $network['icon'] }}"
                               alt="{{ $apprentice['full_name'] . ' ' . $network['type'] }}"
                               title="{{ $apprentice['full_name'] . ' ' . $network['type'] }}"
                               class="img style-svg">
                        </a>
                      </div>
                    @endforeach
                  </div>
                @endif
              </div>
            </article>
          @endforeach
        </div>
      </div>
    @endif

    @if( $past_apprentices_section )

      <div class="container">
        <div class="past_apprentices_wrapper">
          @if( $past_apprentices_section['title'] )
            <div class="past_apprentices_title">
              {{ $past_apprentices_section['title'] }}
            </div>
          @endif

          <div class="past_apprentices html-content">
            {!! $past_apprentices_section['past_apprentices'] !!}
          </div>

        </div>
      </div>
    @endif

  </section>
@endif
