<x-front.app>

 <div class="bg-white sm:py-8 lg:py-4">
   <section class="text-gray-600 font-sans">
    <div class="container max-w-4xl px-4 mx-auto md:px-8">
      <h2 class="text-2xl bg-gray-100 p-2">{{ $convention1->convention_no }}</h2>
      <div class="py-2 mb-4 text-2xl font-bold text-center">総合優勝：{{$convention_results2->team_name}}</div>
      
    <div class="w-full h-160 pt-8 mx-auto bg-cover bg-no-repeat bg-center" style="background-image: url({{ asset('storage/info/' . 'bg_past1.jpg')}})">
      <div class="flex">
        <div class="mx-auto">
         <div class="text-white text-center mb-4">Agroup:優勝</div>
         <div class="text-white border-b-2 border-ral-400 mb-4 text-center text-md">{{$convention_results1->team_name}}</div>
         <div><img class="w-32 h-32 mb-4" src="{{ asset('storage/teams/logo/' . $team_logo_url1)}}"></div> 
         <div class="text-white text-center">{{$convention_results1->win}}勝{{$convention_results1->lose}}敗{{$convention_results1->draw}}分</div>
        </div>

        <div class="mx-auto">
         <div class="text-white text-center mb-4">Bgroup:優勝</div>
         <div class="text-white border-b-2 border-ral-400 mb-4 text-center text-md">{{$convention_results2->team_name}}</div>
         <div><img class="w-32 h-32 mb-4" src="{{ asset('storage/teams/logo/' . $team_logo_url2)}}"></div>
          <div class="text-white text-center">{{$convention_results2->win}}勝{{$convention_results2->lose}}敗{{$convention_results2->draw}}分</div>
        </div>
      </div>
      <!--得点王 START-->
      <div class="flex text-white text-center mt-8">
        <div class="mx-auto w-32 h-32">
          <div>Agroup</div>
          <div>得点王</div>
          <div class="font-bold">{{ $player_rank_goal1->player_name }}</div>
          <div class="text-xs">({{ $player_rank_goal1->team_name }})</div>
          <div>{{ $player_rank_goal1->goals }}ゴール</div>
        </div>
        <div class="mx-auto w-32 h-32">
          <div>Bgroup</div>
          <div>得点王</div>
          <div class="font-bold">{{ $player_rank_goal2->player_name }}</div>
          <div class="text-xs">({{ $player_rank_goal2->team_name }})</div>
          <div>{{ $player_rank_goal2->goals }}ゴール</div>
        </div>
      </div>
      <!--得点王 END-->
      <!--アシスト王 START-->
      <div class="flex text-white text-center">
        <div class="mx-auto w-36 h-36">
          <div>アシスト王</div>
          <div class="font-bold">{{ $player_rank_assist1->player_name }}</div>
          <div class="text-xs">({{ $player_rank_assist1->team_name }})</div>
          <div>{{ $player_rank_assist1->assists }}アシスト</div>
        </div>
        <div class="mx-auto w-36 h-36">
          <div>アシスト王</div>
          <div class="font-bold">{{ $player_rank_assist2->player_name }}</div>
          <div class="text-xs">({{ $player_rank_assist2->team_name }})</div>
          <div>{{ $player_rank_assist2->assists }}アシスト</div>
        </div>
      </div>
      <!--アシスト王 END-->
    </div>
    </div>
   </section>
 </div>

</x-front.app>