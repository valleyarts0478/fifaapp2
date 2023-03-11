<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <section class="text-gray-600 body-font">
        <div class="bg-white py-6 sm:py-8 lg:py-12">
            <div class="mx-auto max-w-screen-xl px-4 md:px-8">

                <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 lg:gap-8">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <x-flash-message status="session('status')" />
                    @foreach ($players as $player)
                        <form method="post" action="{{ route('admin.players.update', ['player' => $player->id]) }}">
                            @method('PUT')
                            @csrf
                            <!-- person - start -->
                            <div class="flex flex-col items-center rounded-lg bg-gray-100 p-4 lg:p-8">
                                <div
                                    class="mb-2 h-24 w-24 overflow-hidden rounded-full bg-gray-200 shadow-lg md:mb-4 md:h-32 md:w-32">
                                    <img src="{{ asset('storage/players/' . 'bg1.jpg') }}" loading="lazy" alt="ral-e"
                                        class="h-full w-full object-cover object-center" />
                                </div>

                                <div>
                                    <div>チームID:{{ $player->team_owner->id }}</div>
                                    <div class="relative">
                                        <label for="player_name" class="leading-7 text-sm text-gray-600">プレイヤー名</label>
                                        <input type="text" id="player_name" name="player_name"
                                            value="{{ $player->player_name }}" required
                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>

                                    <div class="relative">
                                        <label for="position_id"
                                            class="leading-7 text-sm text-gray-600">ポジション(1:FW,2:MF,3:DF,4:GK)</label>
                                        <select name="position_id" id="position_id"
                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            @foreach ($positions as $position)
                                                <option value="{{ $position->id }}"
                                                    @if ($position->id === $player->position->id) selected @endif>
                                                    {{ $position->position_name }}
                                                </option>
                                            @endforeach
                                        </select>


                                        {{-- <input type="text" id="position_id" name="position_id"
                                        value="{{ $player->position_id }}" required
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> --}}
                                    </div>

                                    <div class="relative">
                                        <label for="player_no" class="leading-7 text-sm text-gray-600">背番号</label>
                                        <input type="text" id="player_no" name="player_no"
                                            value="{{ $player->player_no }}" required
                                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                    <div class="p-2 w-full flex justify-around mt-4">
                                        <button type="button"
                                            onclick="location.href='{{ route('admin.players.index') }}'"
                                            class="bg-gray-200 border-0 py-2 px-4 md:px-8 focus:outline-none hover:bg-gray-400 rounded text-sm">戻る</button>
                                        <button type="submit"
                                            class="text-white bg-indigo-500 border-0 py-2 px-4 md:px-8 focus:outline-none hover:bg-indigo-600 rounded text-sm">更新</button>
                                    </div>
                                    {{-- <p class="mb-3 text-center text-sm text-gray-500 md:mb-4 md:text-base">
                                    {{ $player->position->position_name }} / {{ $player->player_no }}</p> --}}
                                </div>
                            </div>
                            <!-- person - end -->
                        </form>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
</x-app-layout>
