<x-front.app>

    <div class="max-w-4xl py-8 mx-auto sm:px-6 lg:px-8">
    
        <ul class="tab">
            <li><a href="#first">Agroup GOAL</a></li>
            <li><a href="#second">Agroup ASSIST</a></li>
            <li><a href="#goal2">Bgroup GOAL</a></li>
            <li><a href="#assist2">Bgroup ASSIST</a></li>
          </ul>
          <!-- first - start -->
          <div id="first" class="area">
            <div class="mb-4 md:mb-8">
                <h2 class="bg-gray-100 py-2 text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">GoalRanking</h2>
            </div>

            <div class="max-w-2xl mx-auto p-4">
                <?php $rank = 1; 
                $cnt = 1;
                $bef_point = 0;
                ?>
            @foreach($league1_goaltotals as $league1_goaltotal)
                <?php 
                //前回と同順位の場合は、順位を加算しない
                if($bef_point != $league1_goaltotal->goals){
                    $rank = $cnt; 
                } ?>
              
              @if ($league1_goaltotal->goals >= 1 && $rank <= 10)
                <div class="rounded-lg border border-gray-300 mb-2 p-4">
                  <div class="w-8"><span class="text-xl font-bold text-ral-400">{{$rank}}</span><span class="text-xs">位</span></div>
                        <div class="flex justify-around w-full">
                          <h2 class="w-32 mt-3 text-lg text-left font-bold">
                            {{$league1_goaltotal->player_name}}
                            <div class="text-sm">GOAL:<span class="text-md">{{$league1_goaltotal->goals}}</span></div>
                          </h2> 
                          <img class="w-16 h-16 ml-auto" src="{{ asset('storage/teams/logo/' . $league1_goaltotal->team_logo_url)}}">
                        </div>

                      <?php $bef_point = $league1_goaltotal->goals;
                        $cnt++; 
                      ?>
              </div>
              @endif
            @endforeach
          </div>
          </div>
            <!-- second - start -->
          <div id="second" class="area">
            <div class="mb-4 md:mb-8">
             <h2 class="bg-gray-100 py-2 text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">AssistRanking</h2>
            </div>

            <div class="max-w-2xl mx-auto p-4">
                <?php $rank = 1; 
                $cnt = 1;
                $bef_point = 0;
                ?>
            @foreach($league1_assisttotals as $league1_assisttotal)
            <?php 
            //前回と同順位の場合は、順位を加算しない
            if($bef_point != $league1_goaltotal->goals){
                $rank = $cnt; 
            } ?>
          
          @if ($league1_assisttotal->assists >= 1 && $rank <= 10)
            <div class="rounded-lg border border-gray-300 mb-2 p-4">
              <div class="w-8"><span class="text-xl font-bold text-ral-400">{{$rank}}</span><span class="text-xs">位</span></div>
                    <div class="flex justify-around w-full">
                      <h2 class="w-32 mt-3 text-lg text-left font-bold">
                        {{$league1_assisttotal->player_name}}
                        <div class="text-sm">ASSIST:<span class="text-md">{{$league1_assisttotal->assists}}</span></div>
                      </h2> 
                      <img class="w-16 h-16 ml-auto" src="{{ asset('storage/teams/logo/' . $league1_assisttotal->team_logo_url)}}">
                    </div>

                  <?php $bef_point = $league1_assisttotal->assists;
                    $cnt++; 
                  ?>
          </div>
          @endif
        @endforeach
          </div>
        </div>

         <!-- goal2 - start -->
          <div id="goal2" class="area">
            <div class="mb-4 md:mb-8">
                <h2 class="bg-gray-100 py-2 text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">GoalRanking</h2>
            </div>

            <div class="max-w-2xl mx-auto p-4">
                <?php $rank = 1; 
                $cnt = 1;
                $bef_point = 0;
                ?>
            @foreach($league2_goaltotals as $league2_goaltotal)
                <?php 
                //前回と同順位の場合は、順位を加算しない
                if($bef_point != $league2_goaltotal->goals){
                    $rank = $cnt; 
                } ?>
              
              @if ($league2_goaltotal->goals >= 1 && $rank <= 10)
                <div class="rounded-lg border border-gray-300 mb-2 p-4">
                  <div class="w-8"><span class="text-xl font-bold text-ral-400">{{$rank}}</span><span class="text-xs">位</span></div>
                        <div class="flex justify-around w-full">
                          <h2 class="w-32 mt-3 text-lg text-left font-bold">
                            {{$league2_goaltotal->player_name}}
                            <div class="text-sm">GOAL:<span class="text-md">{{$league2_goaltotal->goals}}</span></div>
                          </h2> 
                          <img class="w-16 h-16 ml-auto" src="{{ asset('storage/teams/logo/' . $league2_goaltotal->team_logo_url)}}">
                        </div>

                      <?php $bef_point = $league2_goaltotal->goals;
                        $cnt++; 
                      ?>
              </div>
              @endif
            @endforeach
          </div>
          </div>

          <!-- assist2 - start -->
          <div id="assist2" class="area">
            <div class="mb-4 md:mb-8">
             <h2 class="bg-gray-100 py-2 text-gray-800 text-2xl lg:text-3xl font-bold text-center mb-4 md:mb-6">AssistRanking</h2>
            </div>

            <div class="max-w-2xl mx-auto p-4">
                <?php $rank = 1; 
                $cnt = 1;
                $bef_point = 0;
                ?>
            @foreach($league2_assisttotals as $league2_assisttotal)
            <?php 
            //前回と同順位の場合は、順位を加算しない
            if($bef_point != $league2_assisttotal->assists){
                $rank = $cnt; 
            } ?>
          
                @if ($league2_assisttotal->assists >= 1 && $rank <= 10)
                <div class="rounded-lg border border-gray-300 mb-2 p-4">
                <div class="w-8"><span class="text-xl font-bold text-ral-400">{{$rank}}</span><span class="text-xs">位</span></div>
                    <div class="flex justify-around w-full">
                      <h2 class="w-32 mt-3 text-lg text-left font-bold">
                        {{$league2_assisttotal->player_name}}
                        <div class="text-sm">ASSIST:<span class="text-md">{{$league2_assisttotal->assists}}</span></div>
                      </h2> 
                      <img class="w-16 h-16 ml-auto" src="{{ asset('storage/teams/logo/' . $league2_assisttotal->team_logo_url)}}">
                    </div>

                    <?php $bef_point = $league2_assisttotal->assists;
                     $cnt++; 
                    ?>
                </div>
                @endif
            @endforeach
          </div>
        </div>
    
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="{{mix('js/tab.js')}}"></script>
</x-front.app>