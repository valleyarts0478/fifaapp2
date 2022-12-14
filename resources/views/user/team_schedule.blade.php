<x-front.app>

    <section class="text-gray-600">
        <div class="container max-w-4xl px-2 py-8 mx-auto">
          <x-auth-validation-errors class="mb-4" :errors="$errors" />  
          <x-flash-message status="session('status')" />
          <h2 class="mx-auto p-4 text-xl font-bold text-center">チーム別試合日程表</h2>
            <div class="container px-2 mx-auto">
              @foreach ($games as $game)
              <div class="text-center text-sm">第<span class="text-xl px-1">{{$game->section}}</span>節</div>
             @if(($game->game_results->home_goal) === null && ($game->game_results->away_goal) === null)
              <div class="flex flex-wrap border rounded-md pt-4 px-2 pb-2 mb-4">
                <div class="w-20 flex flex-col text-center items-center">
                  <div class="w-8 h-8 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-2 flex-shrink-0">
                    @foreach ($team_names as $team_name)
                       @if($team_name->team_name === $game->home_team)
                       <img class="w-8 h-8" src="{{ asset('storage/teams/logo/' . $team_name->team_logo_url) }}" alt="team_logo">
                       @endif
                    @endforeach
                  </div>
                  <div class="flex-grow">
                    <h3 class="text-gray-900 text-xs title-font font-medium mb-3">{{$game->home_team}}</h3>
                  </div>
                </div>
                    <div class="flex-grow w-20 h-8 text-center">
                      <div>{{ $game->game_date->format('n/j')}}</div>
                    <div>{{ $game->game_date->format('G:i')}}</div>
                    {{-- <div class="text-md mb-2">{{ substr($game->game_date, 5, 5) }}</div>
                    <div class="text-md">{{ substr($game->game_date, 10, 6) }}</div> --}}
                   </div>
                <div class="w-20 flex flex-col text-center items-center">
                  <div class="w-8 h-8 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-2 flex-shrink-0">
                    @foreach ($team_names as $team_name)
                        @if($team_name->team_name === $game->away_team)
                        <img class="w-8 h-8" src="{{ asset('storage/teams/logo/' . $team_name->team_logo_url) }}" alt="team_logo">
                        @endif
                      @endforeach
                   </div>
                  <div class="flex-grow">
                    <h3 class="text-gray-900 text-xs title-font font-medium mb-3">{{$game->away_team}}</h3>
                  </div>
                </div>
              </div>
              <!--ログインしているチームが試合終了した場合-->
             @else
              <div class="flex flex-wrap border rounded-md pt-4 px-2 pb-2 mb-4">
               <div class="w-20 flex flex-col text-center items-center">
                 <div class="w-8 h-8 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-2 flex-shrink-0">
                   @foreach ($team_names as $team_name)
                      @if($team_name->team_name === $game->home_team)
                      <img class="w-8 h-8" src="{{ asset('storage/teams/logo/' . $team_name->team_logo_url) }}" alt="team_logo">
                      @endif
                   @endforeach
                 </div>
                 <div class="flex-grow">
                   <h3 class="text-gray-900 text-xs title-font font-medium">{{$game->home_team}}</h3>
                    <span class="w-4 h-4 text-xs text-indigo-400">
                      @if ($game->game_results->home_own_goal >= 1)
                         (OG{{$game->game_results->home_own_goal}})
                      @endif
                    </span>
                 </div>
                </div>
                  <div class="flex-grow w-20 h-8 text-center text-4xl">
                   <div><span class="mr-2">{{ $game->game_results->home_goal }}</span>:<span class="ml-2">{{$game->game_results->away_goal}}</span></div>
                     <div class="text-xs text-center items-center mt-2">
                      {{ $game->game_date->format('n/j')}}ー試合終了
                     </div>
                  </div>
               <div class="w-20 flex flex-col text-center items-center">
                 <div class="w-8 h-8 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-2 flex-shrink-0">
                  @foreach ($team_names as $team_name)
                      @if($team_name->team_name === $game->away_team)
                      <img class="w-8 h-8" src="{{ asset('storage/teams/logo/' . $team_name->team_logo_url) }}" alt="team_logo">
                      @endif
                    @endforeach
                 </div>
                 <div class="flex-grow">
                   <h3 class="text-gray-900 text-xs title-font font-medium">{{$game->away_team}}</h3>
                    <span class="w-4 h-4 text-xs text-indigo-400">
                      @if ($game->game_results->away_own_goal >= 1)
                         (OG{{$game->game_results->away_own_goal}})
                      @endif
                    </span>
                 </div>
               </div>
               <div class="w-full">
                <div class="w-16 mx-auto my-4 rounded-full border border-gray-400">
                 <button onclick="location.href='{{ route('user.day.schedule_show', ['team' => $game->id ]) }}'" class="font-sans text-gray-500 text-sm pt-1 pb-1 pl-2 pr-2 text-center">Details</button>    
                </div>
               </div>
              </div>
              @endif
              @endforeach
            </div>
          </div>
    </section>
            <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
            <script src="{{mix('js/tab.js')}}"></script>

</x-front.app>
