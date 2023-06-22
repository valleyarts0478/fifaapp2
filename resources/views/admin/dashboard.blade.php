<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('success'))
                        <div class="mb-4">{{ session('success') }}</div>
                    @endif

                    <div class="flex justify-start my-2 mr-2">
                        <button onclick="location.href='{{ route('admin.pastmove') }}'"
                            class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded-md text-lg">大会コピー</button>
                    </div>
                    <div>最新のチーム順位テーブルを過去の大会テーブルにコピーする。</div>
                    <div class="flex justify-start my-2 mr-2">
                        <button onclick="location.href='{{ route('admin.pastplayermove') }}'"
                            class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded-md text-lg">個人スタッツをコピー</button>
                    </div>
                    <div>最新の個人スタッツテーブルを過去の大会テーブルにコピーする。</div>
                    <div class="flex justify-start my-2 mr-2">
                        <button onclick="location.href='{{ route('admin.teammove') }}'"
                            class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded-md text-lg">チームをコピー</button>
                    </div>
                    <div>現大会のチームを次回大会用としてコピーする。</div>
                    <div class="flex justify-start my-2 mr-2">
                        <button onclick="location.href='{{ route('admin.playermove') }}'"
                            class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded-md text-lg">選手をコピー</button>
                    </div>
                    <div>現大会の選手を次回大会用としてコピーする。</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
