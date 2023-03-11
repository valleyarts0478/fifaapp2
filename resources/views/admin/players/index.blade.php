<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="bg-white py-6 sm:py-8 lg:py-12">
        <div class="max-w-screen-lg px-4 md:px-8 mx-auto">

          <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 lg:gap-8">
              @foreach($team_owners as $team_owner)
              <!-- person - start -->
            <div class="flex flex-col items-center bg-gray-100 rounded-lg p-4 lg:p-8">
                <div class="w-24 md:w-32 h-24 md:h-32 bg-gray-200 rounded-full overflow-hidden shadow-lg mb-2 md:mb-4">
                  <img class="w-full h-full object-cover object-center" src="{{ asset('storage/teams/logo/' . $team_owner->team_logo_url) }}" loading="lazy" alt="team_logo">
                </div>
                <div>
                    <div class="text-gray-800 md:text-lg font-bold text-center">{{ $team_owner->convention->convention_no }}</div>
                  <div class="text-blue-400 md:text-lg font-bold text-center">
                    <a href="{{ route('admin.players.show', ['player' => $team_owner->id ]) }}">{{ $team_owner->team_name }}</a>
                  </div>
                  
        
                  <!-- social - start -->
                  <div class="flex justify-center">
                    <div class="flex gap-4">
                      {{-- <span class="ml-2 flex-1 w-0 truncate"></span> --}}
                      {{-- <a class="text-ral-400" href="https://twitter.com/{{$team_list1->twitter_add}}">
                        <svg class="w-5 h-5" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                      </a> --}}
                    </div>
                  </div>
                  <!-- social - end -->
                </div>
              </div>
              <!-- person - end -->
            @endforeach
          </div>
        </div>
      </div>
    </div>
 
</x-app-layout>
