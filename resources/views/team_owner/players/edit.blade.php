<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            選手編集画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />  
                    <x-flash-message status="session('status')" /> 
                    <form method="post" action="{{ route('team_owner.players.update', ['player' => $player->id ]) }}" >
                         @csrf
                         @method('put')   
                        <div class="container px-5 mx-auto flex">
                          <div class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:mx-auto w-full mt-10 md:mt-0 relative z-10 shadow-md">
                            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">選手登録</h2>
                            <p class="leading-relaxed mb-5 text-gray-600">登録説明</p>

                            <label for="convention_id" class="leading-7 text-sm text-gray-600">大会名</label>
                            <select name="convention_id" id="convention_id" class="w-full mb-4 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              @foreach($team_owners as $team_owner)
                               <option value="{{ $team_owner->convention_id }}" >
                                 {{ $team_owner->convention->convention_no }}
                               </option>
                              @endforeach
                            </select>

                            <label for="team_owner_id" class="leading-7 text-sm text-gray-600">チーム名</label>
                                <select name="team_owner_id" id="team_owner_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                   <option value="{{ $player->team_owner->id }}" >
                                     {{ $player->team_owner->team_name }}
                                   </option>
                                 </select>
                                <div class="relative mb-4">
                                  <label for="position_id" class="leading-7 text-sm text-gray-600">ポシション</label>
                                  <select name="position_id" id="position_id" class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">  
                                   @foreach($positions as $position) 
                                    <option value="{{ $position->id }}" @if($position->id == $player->position->id) selected @endif>
                                     {{ $position->position_name }}
                                    </option>    
                                   @endforeach
                                  </select>
                                </div>
                            <div class="relative mb-4">
                              <label for="player_no" class="leading-7 text-sm text-gray-600">背番号</label>
                              <input type="text" id="player_no" name="player_no" value="{{ $player->player_no }}" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <div class="relative mb-4">
                              <label for="player_name" class="leading-7 text-sm text-gray-600">選手名</label>
                              <input type="text" id="player_name" name="player_name" value="{{ $player->player_name }}" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <div class="p-2 flex justify-around w-full mt-4">
                              <button type="button" onclick="location.href='{{ route('team_owner.players.index') }}'" class="text-gray bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                              <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新</button>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- <div class="mx-auto w-32 p-6 bg-white">
                  <form id="delete_{{$player->id}}" method="post" action="{{ route('team_owner.players.destroy', ['player' => $player->id]) }}">                 
                    @csrf
                    @method('delete')
                      <a href="#" data-id="{{ $player->id }}" onclick="deletePost(this)" class="p-2 rounded-full border-2 border-gray-400">削除</a>        
                   </form>
                  </div> --}}
            </div>
        </div>
    </div>
    <script>
      function deletePost(e) {
      'use strict';
      if (confirm('本当に削除してもいいですか?')) { document.getElementById('delete_' + e.dataset.id).submit(); }
      }
    </script>
</x-app-layout>
