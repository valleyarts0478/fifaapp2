<x-front.app>

    <section class="text-gray-600 body-font">
      <div class="container max-w-screen-lg py-4 mx-auto flex px-5 pt-24 items-center justify-center flex-col">
        <img class="lg:w-1/6 md:w-1/3 w-1/2 mb-4 object-cover object-center rounded" src="{{ asset('storage/teams/logo/' . $team->team_logo_url) }}" loading="lazy" alt="team_logo">
        <div class="text-center lg:w-2/3 w-full">
          <h2 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $team->team_name }}</h2>
        </div>

      <div class="flex flex-wrap p-2 py-4 lg:px-36 md:px-8">メンバー:{{ $count }}人</div>
      <div class="flex flex-wrap w-full mx-auto">
          @foreach ($players as $player )                  
          <div class="p-2 w-1/2 md:w-1/3">
            {{-- <x-player_icon :player=$player></x-player_icon> --}}
              <div class="w-full h-64 pt-8 md:pt-16 md:h-96 bg-contain bg-no-repeat bg-center" style="background-image: url({{ asset('storage/players/' . 'player_card1.png')}})">
                  <div class="ml-5 lg:ml-16 text-ral-400 text-4xl md:text-5xl">
                    {{ $player->position->position_name }}
                  </div>
                  <div class="w-8 lg:w-12 text-ral-400 text-3xl text-center md:text-5xl mt-1 ml-5 lg:ml-16">{{ $player->player_no }}</div>
                  <div class="text-center text-xl md:text-3xl text-gray-900 title-font font-medium mt-8 md:mt-16">{{ $player->player_name }}</div>
                  <div class="w-8 h-8 md:w-12 md:h-12 mx-auto mt-2">
                    <img src="{{ asset('storage/teams/logo/' . $player->team_owner->team_logo_url) }}">
                  </div>
              </div>
          </div>
          @endforeach
      </div>
    </div>
    </section>

</x-front.app>