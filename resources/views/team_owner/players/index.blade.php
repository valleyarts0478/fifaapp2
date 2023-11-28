<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
      <div class="text-center my-2 mr-2">
        <button onclick="location.href='{{ route('team_owner.players.create') }}'" class="text-white bg-ral-400 border-0 py-2 px-8 focus:outline-none rounded-md text-lg">新規登録</button>    
      </div>
        <x-flash-message status="session('status')" />
      <div class="flex flex-wrap p-2 mx-auto py-4 lg:px-36 md:px-8 -m-2">メンバー:{{ $count }}人</div>
        <div class="flex flex-wrap lg:px-36 md:px-8 -m-2">
            @foreach ($players as $player )                  
            <div class="p-2 lg:w-1/2 md:w-1/2 w-full">
              <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                    {{-- <img alt="team" class="w-12 h-12 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/80x80"> --}}
                    
                    <x-player_icon :player=$player></x-player_icon>
                    <div class="flex-grow">
                    <span class="flex">
                      <span class="flex w-6 h-6 rounded-full items-center justify-center bg-ral-400 uppercase px-1 py-1 text-xs text-white font-bold">
                        {{ $player->position->position_name }}</span>
                      <div class="text-gray-900 title-font font-medium ml-2">{{ $player->player_name }}</div></span>

                      <span class="flex">
                        <span class="flex w-6 h-6 mt-1 rounded-full items-center justify-center bg-ral-400 uppercase px-1 py-1 text-xs text-white font-bold">
                          NO</span>
                      <div class="text-gray-500 title-font font-medium mt-1 ml-2">{{ $player->player_no }}</div></span>
                </div>
                <div class="text-center">
                  <button onclick="location.href='{{ route('team_owner.players.edit', ['player' => $player->id ]) }}'" class="text-white bg-ral-400 border-0 py-2 px-4 mr-1 focus:outline-none rounded-md text-sm">編集</button>      
                </div>
                {{-- <div class="text-center">
                  <button onclick="location.href='{{ route('team_owner.players.destroy', ['player' => $player->id ]) }}'" class="text-white bg-ral-200 border-0 py-2 px-4 focus:outline-none rounded-md text-sm">削除</button>      
                </div> --}}

                {{-- <form id="delete_{{$player->id}}" method="post" action="{{ route('team_owner.players.destroy', ['player' => $player->id]) }}">                 
                  @csrf
                  @method('delete')
                  <td class="md:px-4 py-3">
                    <a href="#" data-id="{{ $player->id }}" onclick="deletePost(this)" class="text-white bg-ral-200 border-0 py-2 px-4 mr-1 focus:outline-none rounded-md text-sm">削除</a>
                  </td>
                </form> --}}


              </div>
            </div>
            @endforeach
        </div>
   </div>
   <script>
    function deletePost(e) {
    'use strict';
    if (confirm('本当に削除してもいいですか?')) { document.getElementById('delete_' + e.dataset.id).submit(); }
    }
  </script>
</x-app-layout>

