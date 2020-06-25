@if( $main_content )

  <div class="main_content">

    @foreach($main_content as $item)

      <div class="main_content__item">

        <div class="main_content__title">{{ $item['item']['title'] }}</div>

        <div class="main_content__content html-content">
          {!! $item['item']['content'] !!}
        </div>

      </div>

    @endforeach

  </div>

@endif
