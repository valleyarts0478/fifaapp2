<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <ul class="accordion-area">
        <li>
            <section class="rounded-md">
            <h3 class="title">選手登録</h3>
            <div class="box text-sm">
                <ul class="ml-4 list-disc">
                    <li>1チーム20名まで(comは除く)</li>
                    <li>毎週土曜日の夜12時までに登録した選手のみ翌日試合参加可能</li>
                    <li>退団する選手は申告制で運営側で退団処理をします。</li>
                </ul> 
            </div>
          </section>
        </li>
        <li>
          <section class="rounded-md">
            <h3 class="title">試合結果入力方法</h3>
            <div class="box text-sm">
              <ul class="ml-4 list-disc">
                  <li>総得点は無得点でも「0」を入力する。</li>
                  <li>OG欄は相手のオウンゴールがあった場合のみ入力。(なければ空欄)</li>
                  <li>総得点欄以外「0」は入力しない。</li>
              </ul> 
          </div>
          </section>
        </li>
        <li>
          <section class="rounded-md">
            <h3 class="title">試合結果入力画面説明</h3>
            <div class="box">
              <img class="w-full" src="{{ asset('storage/info/' . "stats_input.png") }}" alt="スタッツ入力説明">
                <img src="">
            </div>
          </section>
        </li>
      </ul>


      <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
      <script src="{{mix('js/accordion.js')}}"></script>
</x-app-layout>