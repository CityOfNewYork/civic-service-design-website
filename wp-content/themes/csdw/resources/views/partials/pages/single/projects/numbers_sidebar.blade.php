@if( $numbers_sidebar )
  <div class="white_block white_block">
    <div class="white_block__wrapper white_block__wrapper--sidebar">
      @foreach( $numbers_sidebar as $item )

        <div class="numbers_item">
          <div class="numbers_item__number">
            {{ $item['number'] }}
          </div>
          <div class="numbers_item__description">
            {{ $item['description'] }}
          </div>
        </div>

      @endforeach
    </div>
  </div>
@endif
