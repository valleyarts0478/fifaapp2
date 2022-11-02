<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            選手登録画面
        </h2>
    </x-slot>

    {{-- <div class="py-12"> --}}
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <!-- Validation Errors -->
                  <x-auth-validation-errors class="mb-4" :errors="$errors" />  
                    <x-flash-message status="session('status')" />                          
                    <section class="text-gray-600 body-font relative">
                   

                      <form method="post" action="{{ route('team_owner.players.store') }}" >
                        @csrf
                        {{-- @method('put') --}}
                        <div class="container px-5 py-2 mx-auto flex">
                          <div class="lg:w-1/2 md:w-1/2 bg-white rounded-lg p-4 md:p-4 flex flex-col md:mx-auto w-ful md:mt-0 relative z-10 shadow-md">
                            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">選手登録</h2>
                            <ul class="leading-relaxed mb-5 text-gray-600 list-inside">
                              <li>PSIDで1名ずつ登録</li>
                              <li>半角英数字のみ使用</li>
                            </ul>

                          
                            <label for="convention_id" class="leading-7 text-sm text-gray-600">大会名</label>
                            <select name="convention_id" id="convention_id" class="w-full mb-4 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              @foreach($team_owners as $team_owner)
                               <option value="{{ $team_owner->convention_id }}" >
                                 {{ $team_owner->convention->convention_no }}
                               </option>
                              @endforeach
                            </select>
                     

                            <label for="team_owner_id" class="leading-7 text-sm text-gray-600">チーム名</label>
                          <select name="team_owner_id" id="team_owner_id" class="w-full mb-4 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @foreach($team_owners as $team_owner)
                             <option value="{{ $team_owner->id }}" >
                               {{ $team_owner->team_name }}
                             </option>
                            @endforeach
                          </select>
                          <div class="relative mb-4">
                            <select name="position_id" id="position_id" class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">  
                              @foreach($positions as $position) 
                               <option value="{{ $position->id }}">
                                {{ $position->position_name }}
                               </option>    
                              @endforeach
                             </select>
                          </div>
                            <div class="relative mb-4">
                              <label for="player_no" class="leading-7 text-sm text-gray-600">背番号(半角数字)</label>
                              <input type="text" id="player_no" name="player_no" value="{{ old('player_no') }}" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <div class="relative mb-4">
                              <label for="player_name" class="leading-7 text-sm text-gray-600">選手名(PSID)</label>
                              <input type="text" id="player_name" name="player_name" value="{{ old('player_name') }}" required class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <div class="p-2 flex justify-around w-full mt-4">
                              <button type="button" onclick="location.href='{{ route('team_owner.players.index') }}'" class="text-gray bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                              <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録</button>
                            </div>
                            <p class="text-xs text-gray-500 mt-3"></p>
                          </div>
                        </div>

                        <table class="table-fixed mt-2 mx-auto">
                          <thead>
                            <tr>
                              <th class="w-1/4 px-4 py-2">ポジション</th>
                              <th class="w-1/4 px-4 py-2">背番号</th>
                              <th class="w-3/4 px-4 py-2">選手名</th>
                            </tr>
                          </thead>
                            @foreach ($players as $player)
                            <tbody>
                              <tr>
                                <td class="border px-4 py-2">{{ $player->position->position_name }}</td>
                                <td class="border px-4 py-2">{{ $player->player_no }}</td>
                                <td class="border px-4 py-2">{{ $player->player_name }}</td>
                              </tr>
                            </tbody>
                            @endforeach
                        </table>

                      </section>
                    </form>
                </div>
            </div>
        </div>
    {{-- </div> --}}
</x-app-layout>
