<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            チーム編集画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" /> 
                    <form method="post" action="{{ route('team_owner.teams.update', ['team' => $team->id]) }}" enctype="multipart/form-data">
                        {{-- @method('PUT') --}}
                        @csrf
                        <div class="-m-2">
                          <div class="p-2 max-w-md mx-auto">
                            <div class="relative">
                              <label for="team_name" class="leading-7 text-sm text-gray-600">チーム名(必須)</label>
                              <input type="text" id="team_name" name="team_name" value="{{ $team->team_name }}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>
                          <div class="p-2 max-w-md mx-auto">
                            <div class="relative">
                              <div class="p-2 w-1/2">
                                <x-team-logo :teamlogourl="$team->team_logo_url" />
                              </div>
                            </div>
                          </div>
                          <div class="p-2 max-w-md mx-auto">
                            <div class="relative">
                              <label for="image" class="leading-7 text-sm text-gray-600">チームロゴ画像</label>
                              <input type="file" id="team_logo_url" name="team_logo_url" accept="image/png,image/jpeg,image/jpg" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>
                          <div class="p-2 w-full flex justify-around mt-4">
                            <button type="button" onclick="location.href='{{ route('team_owner.teams.index') }}'" class="bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                            <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>