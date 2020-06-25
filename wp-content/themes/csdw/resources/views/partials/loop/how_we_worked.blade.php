@php
  $image_size = ( $type == 'small' ) ? 'How We Work Small' : 'How We Work Large';
@endphp
<div class="how_we_worked_item how_we_worked_item--{{$type}}">
  <div class="how_we_worked_item__thumbnail">
    <img src="{{ wp_get_attachment_image_url( $item['image'], $image_size ) }}"
         alt="{{ $item['description'] }}"
         title="{{ $item['description'] }}"
         class="img img-width"
    >
  </div>
  <div class="how_we_worked_item__description">
    {{ $item['description'] }}
  </div>
</div>
