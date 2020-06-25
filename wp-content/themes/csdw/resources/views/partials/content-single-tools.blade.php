<article @php post_class('with-breadcrumbs') @endphp>

  @include('partials.global.post-header')

  @if( $blocks || $sidebar_items )
    <div class="main-content chameleonic">
      <div class="container">
        <div class="row">
          @if( $blocks )
            <div class="main-content-wrapper">
              @foreach( $blocks as $block )
                <div class="block-item">
                  @if( $block['title'] )
                    <div class="block-item__title">
                      {{ $block['title'] }}
                    </div>
                  @endif
                  <div class="block-item__content html-content">
                    {!! $block['content'] !!}
                  </div>
                </div>
              @endforeach
            </div>
          @endif
          @if( $sidebar_items )
            <div class="sidebar">
                <div class="worksheets-wrapper">
                  @foreach( $sidebar_items as $item )
                    <div class="worksheet-item">
                      <div class="worksheet-item__thumbnail">
                        <img class="img img-width" src="{{ wp_get_attachment_image_url( $item['image'], 'full' ) }}" alt="">
                      </div>

                      @if( $item['description'] )
                        <div class="worksheet-item__description">
                          {!! $item['description'] !!}
                        </div>
                      @endif

                      <div class="button-wrapper">
                        <a href="{{ $item['file']['url'] }}" class="btn btn-red hover-state" download>{{ $item['button_text'] }}</a>
                      </div>
                    </div>
                  @endforeach
                </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  @endif


  @include('partials.sections.related', [ 'related_section' => $related_section ])

</article>
