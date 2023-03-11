@php
  if($type === 'shops'){
    $path = 'storage/shops/';
  }
  if($type === 'products'){
    $path = 'storage/products/';
  }
  if($type === 'teams'){
    $path = 'storage/teams/logo/';
  }
@endphp
<div>
 @if(empty($filename))
   <img src="{{ asset('images/no_image.jpg') }}">
 @else
   <img src="{{ asset($path . $filename) }}">
 @endif
</div>
