<x-front.app>
<div class="max-w-screen-lg mx-auto">    
  <div class="bg-white">
    <div class="font-sans max-w-screen-lg px-8 md:px-8 mx-auto">

      <h2 class="text-center text-xl bg-gray-100 p-4">{{ $info->title }}</h2>

      <div class="px-12">
        <div class="infolist">{!! $info->post !!}</div>
      </div>
      <div class="mt-4 text-right">{{ $info->updated_at }}</div>
    </div>
    
  </div>
</div>


</x-front.app>

