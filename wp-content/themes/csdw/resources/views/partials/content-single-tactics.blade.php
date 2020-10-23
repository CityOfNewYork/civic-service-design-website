<article @php post_class('with-breadcrumbs') @endphp>

  @include('partials.global.tactic-header')

  @if( $steps || $additional_resources )
    <div class="main-content chameleonic">
      <div class="container">
        <div class="row">
          @if( $steps )
            <div class="main-content-wrapper">
              @foreach( $steps as $key => $step )
                <div class="step-item">
                  <div class="step-item__title">
                    <span class="step-item__number">{{ $key + 1 }}.</span>
                    <span>{{ $step['title'] }}</span>
                  </div>
                  <div class="step-item__content html-content">
                    {!! $step['content'] !!}
                  </div>
                </div>
              @endforeach
            </div>
          @endif
          @if( $additional_resources )
            <div class="sidebar">
              <div class="sidebar-item">
                <div class="sidebar-item__title">
                  Additional Resources
                </div>
                <div class="resources-wrapper">
                  @foreach( $additional_resources as $resource )
                    @php
                      $resource_url = ( strtolower($resource['type']) == 'download' ) ? $resource['file']['url'] : $resource['link'];
                      $resource_attr = ( strtolower($resource['type']) == 'download' ) ? 'download' : 'target="_blank"';
                      $svg = ( strtolower($resource['type']) == 'download' ) ? 'icon-ui-download' : 'icon-ui-external-link';
                    @endphp
                    <div class="resource-item">
                      <a href="{{ $resource_url }}" class="resource-item__image" {{ $resource_attr }}>
                        <img
                          src="{{ wp_get_attachment_image_url( $resource['image'], 'Resources Listing' ) }}"
                          alt="{{ $resource['title'] }}"
                          title="{{ $resource['title'] }}"
                          class="img img-width"
                        >
                        <span class="resource-item__icon">
                        <svg class="{{ $svg }}" role="img">
                          <use xlink:href="#{{ $svg }}"></use>
                        </svg>
                      </span>
                      </a>
                      <a class="resource-item__title" href="{{ $resource_url }}" {{ $resource_attr }}>
                        {{ $resource['title'] }}
                      </a>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>

  @endif

  @include('partials.sections.posts-full', [ 'posts_section' => $posts_section ])

  @include('partials.sections.related', [ 'related_section' => $related_tactics_section ])
</article>
