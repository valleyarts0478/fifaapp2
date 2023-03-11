<x-front.app>

<div class="bg-white py-24 sm:py-8 lg:py-12 max-w-screen-lg mx-auto">
  <ul class="tab">
    <li><a href="#first">Agroup</a></li>
    <li><a href="#second">Bgroup</a></li>
  </ul>

  @if($game1_count === 0)
   1部日程表はありません。<br>
  @else
 <div id="first" class="area">

    <div class="container px-2 md:px-4 mx-auto">
      
      {{-- <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-4 md:gap-6 xl:gap-8"> --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-2 md:gap-4 xl:gap-4">
        <!-- article - start -->
        @foreach($team_list as $date => $teams)         
        <a href="{{ route('user.day.schedule', ['team' => $date ]) }}" class="group h-48 md:h-64 xl:h-96 flex flex-col bg-gray-100 rounded-lg shadow-lg overflow-hidden relative">
          <img class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" src="{{ asset('storage/teams/' . "ral_card1.jpg") }}" alt="team_logo">
          <div class="bg-gradient-to-r from-ral-400 md:via-transparent to-transparent absolute inset-0 pointer-events-none"></div>
  
          <div class="relative p-4 mt-2 lg:mt-auto">
            <div class="mb-16 md:mb-24 text-white text-5xl opacity-70">
              @foreach($section as $key => $value)
              @if($key == $date)
                @switch($value['section'])
                  @case($value['section'] === 1)
                  {{$value['section']}}<span class="text-xl">st</span>
                   @break
                  @case($value['section'] === 2)
                  {{$value['section']}}<span class="text-xl">nd</span>
                   @break
                  @case($value['section'] === 3)
                  {{$value['section']}}<span class="text-xl">rd</span>
                   @break
                  @case($value['section'] >= 4)
                  {{$value['section']}}<span class="text-xl">th</span>
                   @break
                @endswitch
              @endif
              @endforeach 
          </div>            
            {{-- <h2 class="text-gray-200 transition duration-100 mb-2">Schedule</h2> --}}
            <div class="text-white text-md md:text-xl">{{ $date }}</div>  
            <div class="text-ral-300 text-xs md:text-xl">Show more</div>
          </div>
        </a>     
        @endforeach
        <!-- article - end -->    
        {{-- {{ $team_list->links() }}    --}}
      </div>
    </div>
    
  </div><!--first area end-->
  @endif

  @if($game2_count === 0)
  2部日程表はありません。<br>
  @else
  <div id="second" class="area">
   <div class="container px-2 md:px-8 mx-auto">
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-2 md:gap-4 xl:gap-4">
      <!-- article - start -->
      @foreach($team_list_second as $date => $teams)      
       
      <a href='{{ route('user.day.schedule2', ['team' => $date ]) }}'" class="group h-48 md:h-64 xl:h-96 flex flex-col bg-gray-100 rounded-lg shadow-lg overflow-hidden relative">
        <img class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-110 transition duration-200" src="{{ asset('storage/teams/' . "ral_card1.jpg") }}" alt="team_logo">
        <div class="bg-gradient-to-r from-ral-400 md:via-transparent to-transparent absolute inset-0 pointer-events-none"></div>
  
        <div class="relative p-4 mt-2 lg:mt-auto">
          <div class="mb-16 md:mb-24 text-white text-5xl opacity-70">
            @foreach($section2 as $key => $value)
            @if($key == $date)
              @switch($value['section'])
                @case($value['section'] === 1)
                {{$value['section']}}<span class="text-xl">st</span>
                 @break
                @case($value['section'] === 2)
                {{$value['section']}}<span class="text-xl">nd</span>
                 @break
                @case($value['section'] === 3)
                {{$value['section']}}<span class="text-xl">rd</span>
                 @break
                @case($value['section'] >= 4)
                {{$value['section']}}<span class="text-xl">th</span>
                 @break
              @endswitch
            @endif
            @endforeach 
        </div>  

          {{-- <h2 class="text-gray-200 transition duration-100 mb-2">Schedule</h2> --}}
          <div class="text-white text-md md:text-xl">{{ $date }}</div>  
            <div class="text-ral-300 text-xs md:text-xl">Show more</div>
        </div>
      </a>
       
      @endforeach
      <!-- article - end -->       
    </div>
   </div>
  </div><!--second area end-->
  @endif




</div>



  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="{{mix('js/tab.js')}}"></script>
</x-front.app>