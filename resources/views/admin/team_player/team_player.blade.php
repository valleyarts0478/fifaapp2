<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="max-w-screen-lg px-4 md:px-8 mx-auto">
            <div>{{ $count }}人</div>
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <x-flash-message status="session('status')" />

            @foreach ($players as $player)
                <form method="post" action="{{ route('admin.team_player.update', ['team_player' => $player->id]) }}">
                    @method('PUT')
                    @csrf
                    <div class="mt-4">チームID:{{ $player->team_owner->id }}</div>
                    <div class="relative">
                        <label for="player_name" class="leading-7 text-sm text-gray-600">プレイヤー名</label>
                        <input type="text" id="player_name" name="player_name" value="{{ $player->player_name }}"
                            required
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>

                    <div class="relative">
                        <label for="position_id"
                            class="leading-7 text-sm text-gray-600">ポジション(1:FW,2:MF,3:DF,4:GK)</label>
                        <select name="position_id" id="position_id"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}" @if ($position->id === $player->position->id) selected @endif>
                                    {{ $position->position_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="relative">
                        <label for="player_no" class="leading-7 text-sm text-gray-600">背番号</label>
                        <input type="text" id="player_no" name="player_no" value="{{ $player->player_no }}" required
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>

                    <div class="p-2 w-full flex justify-around mt-4">
                        <button type="button" onclick="location.href='{{ route('admin.team_owners.index') }}'"
                            class="bg-gray-200 border-0 py-2 px-4 md:px-8 focus:outline-none hover:bg-gray-400 rounded text-sm">戻る</button>
                        <button type="submit"
                            class="text-white bg-indigo-500 border-0 py-2 px-4 md:px-8 focus:outline-none hover:bg-indigo-600 rounded text-sm">更新</button>
                    </div>
                </form>
                <form id="delete_{{$player->id}}" method="post" action="{{ route('admin.team_player.destroy', ['team_player' => $player->id]) }}">                 
                        
                    @method('delete')
                    @csrf
                    <td class="md:px-3 py-3">
                      <a href="#" data-id="{{ $player->id }}" onclick="deletePost(this)" class="text-white bg-red-400 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded">削除</a>
                    </td>
                  </form>
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
