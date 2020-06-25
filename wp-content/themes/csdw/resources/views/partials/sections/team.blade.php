@if( $team_section )
  <section class="section-team section section-pink-30t chameleonic">
    <div class="container">

      @if( $team_section['section_title'] )
        <div class="section-header">
          <h2 class="section-title">
            {{ $team_section['section_title'] }}
          </h2>
        </div>
      @endif

        @foreach( $team_section['members'] as $member )

          <article class="person">
            <div class="person__thumbnail">
              <img
                src="{{ wp_get_attachment_image_url( $member['photo'], 'Team Listing' ) }}"
                alt="{{ $member['full_name'] }}"
                title="{{ $member['full_name'] }}"
                class="img img-width"
              >
            </div>

            <div class="person__info">

              <header>
                <h3 class="person__name">{{ $member['full_name'] }}</h3>
              </header>

              <div class="person__position">
                {{ $member['position'] }}
              </div>

              <div class="person__description html-content">
                {!! $member['description'] !!}
              </div>

              @if( $member['social_networks'] )
                <div class="person__social-networks">
                  @foreach( $member['social_networks'] as $network )

                    <div class="person__social-network-item">
                      <a href="{{ esc_url( $network['link'] ) }}"
                         target="_blank" rel="noopener noreferrer">
                        <span>{{ $member['full_name'] . ' ' . $network['type'] }}</span>
                        <img src="{{ $network['icon'] }}"
                             alt="{{ $member['full_name'] . ' ' . $network['type'] }}"
                             title="{{ $member['full_name'] . ' ' . $network['type'] }}"
                             class="img style-svg">
                      </a>
                    </div>
                  @endforeach
                </div>
              @endif

              <div class="button-wrapper">
                <button class="btn btn-secondary toggleContent"
                        data-full="Read full bio"
                        data-less="Hide full bio"
                ><span>Read full bio</span></button>
              </div>

            </div>

          </article>

        @endforeach

    </div>
  </section>
@endif
