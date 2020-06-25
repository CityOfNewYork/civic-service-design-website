@if( $how_we_worked_section )
  <section class="section-how_we_worked section section-pink-30t chameleonic">
    <div class="container">

      <div class="section-header">
        <h2 class="section-title">
          {{ $how_we_worked_section['section_title'] }}
        </h2>

        @if( $how_we_worked_section['description'] )
          <div class="section-description">
            {{ $how_we_worked_section['description'] }}
          </div>
        @endif
      </div>

      <div class="how_we_worked_wrapper">
        @foreach( $how_we_worked_section['items'] as $row )

          @if( $row['acf_fc_layout'] == 'left_small' )
            @php $sizes = ['left' => 'small', 'right' => 'large'] @endphp
          @else
            @php $sizes = ['left' => 'large', 'right' => 'small'] @endphp
          @endif


          <div class="row">
            @foreach( $row['row'] as $key => $item )
                @include('partials.loop.how_we_worked', ['item' => $item, 'type' => $sizes[$key]])
            @endforeach
          </div>
        @endforeach
      </div>

    </div>
  </section>
@endif
