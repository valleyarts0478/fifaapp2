<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <section class="rounded-md">
        <h2 class="text-red-600 font-bold">選手登録エラー</h2>
            <div class="max-w-4xl mx-auto px-6 lg:px-8">
                <div class="mt-8 text-ral-200 font-bold">考えらえる理由</div>
                <div class="mt-4">登録時間外である。</div>
                <div class="mt-4">毎週日曜日の00:00～月曜日の5:59:59までは選手登録ができません。</div>
                <div class="mt-4">選手登録可能時間:月曜日6:00～土曜日23:59:59</div>
            </div>
            {{-- <div class="max-w-4xl mx-auto px-6 lg:px-8">
                <div class="mt-8 text-ral-200 font-bold">考えらえる理由2</div>
                <div class="mt-4">登録人数が21人を超えている。</div>
                <div class="mt-4">登録人数の上限は21人です。(comを含む)</div>
                <div class="mt-4">登録画面に戻り人数を確認をしてください。</div>
            </div> --}}
    </section>


</x-app-layout>
