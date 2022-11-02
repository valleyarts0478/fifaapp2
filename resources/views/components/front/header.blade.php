<div class="max-w-screen-lg mx-auto text-gray-600 body-font">
    <div class="container mx-auto mb-8 pt-2 flex flex-wrap flex-col md:flex-row items-center">


      <a href="/" class="flex mx-auto title-font font-medium items-center text-gray-900 mt-2 md:mb-0">
        <div class="-ml-8 mr-1 w-8 h-8">
          <img src="{{ asset('storage/teams/' . "RALE_logo.png") }}">
        </div>
        <span class="text-ral-400 text-2xl font-bold">RAL-E</span>
      </a>
      
    </div>
    {{-- <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
      <a href="/" class="mr-5 hover:text-gray-900">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
      </a>
      <a href="/team_list" class="mr-5 text-sm hover:text-gray-900">チーム一覧</a>
      <a href="/team_rank" class="mr-5 text-sm hover:text-gray-900">順位表</a>
      <a href="/player_rank" class="mr-5 text-sm hover:text-gray-900">得点・アシスト</a>
      <a href="/schedule_list" class="mr-5 text-sm hover:text-gray-900">日程表</a>
    </nav> --}}
   <!--hamburger-menu-->
    <div class="hamburger-menu">
      <input type="checkbox" id="menu-btn-check">
      <label for="menu-btn-check" class="menu-btn"><span></span></label>
      <!--ここからメニュー-->
      <div class="menu-content">
          <ul>
            <li>
              <a href="/" class="ml-4 text-sm hover:text-gray-900">HOME</a>
            </li>
              <li>
                <a href="/team_list" class="ml-4 text-sm hover:text-gray-900">チーム一覧</a>
              </li>
              <li>
                <a href="/team_rank" class="ml-4 text-sm hover:text-gray-900">順位表</a>
              </li>
              <li>
                <a href="/player_rank_total" class="ml-4 text-sm hover:text-gray-900">得点・アシスト</a>
              </li>
              <li>
                <a href="/schedule_list" class="ml-4 text-sm hover:text-gray-900">日程表</a>
              </li>
              <li>
                  <a href="{{ route('team_owner.login') }}" class="ml-4 text-sm underline">チームLOGIN</a>
              </li>
          </ul>
      </div>
      <!--ここまでメニュー-->
  </div>

</div>