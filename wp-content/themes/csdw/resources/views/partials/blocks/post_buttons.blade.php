@if( $header_buttons )
  <div class="buttons-circle">
    @foreach( $header_buttons as $button )
      @switch($button['type'])
        @case('email')
        <a href="mailto:?subject={{ get_the_title() }}&body={{ get_the_permalink() }}" class="btn button-circle button-circle--email button-circle--{{$button['color']}}">
          <svg class="icon-ui-mail" role="img">
            <use xlink:href="#icon-ui-mail"></use>
          </svg>
        </a>
        @break
        @case('print')
        <button class="btn printBtn button-circle button-circle--print button-circle--{{$button['color']}}">
          <svg class="icon-ui-printer" role="img">
            <use xlink:href="#icon-ui-printer"></use>
          </svg>
        </button>
        @break
      @endswitch
    @endforeach
  </div>
@endif
