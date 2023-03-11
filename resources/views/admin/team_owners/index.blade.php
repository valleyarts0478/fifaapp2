<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            参加チームオーナー一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:p-6 bg-white border-b border-gray-200">
                    <section class="text-gray-600 body-font">
                      <div class="container md:px-5 mx-auto">
                        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                          <x-flash-message status="session('status')" />
                          <div class="flex max-w-md justify-end my-2">
                            <button onclick="location.href='{{ route('admin.team_owners.create') }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">新規登録する</button>    
                          </div>
                          <table class="table-auto w-full text-left mb-4 whitespace-no-wrap">
                            <thead>
                              <tr>
                                <th class="md:px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                                <th class="md:px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">大会名</th>
                                <th class="md:px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">リーグ</th>
                                <th class="md:px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">チーム名</th>
                                <th class="md:px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">略称</th>
                                <th class="md:px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">ロゴ</th>
                                <th class="md:px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                                <th class="md:px-2 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($team_owners as $team_owner)
                              <tr>
                                <td class="md:px-2 py-3">{{ $team_owner->id }}</td>
                                <td class="md:px-2 py-3">{{ $team_owner->convention->convention_no }}</td>
                                <td class="md:px-2 py-3">{{ $team_owner->league->league_name }}</td>
                                {{-- <td class="md:px-2 py-3"><a href="{{ route('admin.team_player.team_player', ['team_owner' => $team_owner->id ]) }}">{{ $team_owner->team_name }}</a></td> --}}
                                <td class="md:px-2 py-3 text-blue-400"><a href="{{ route('admin.team_player.edit', ['team_player' => $team_owner->id ]) }}">{{ $team_owner->team_name }}</a></td>
                                <td class="md:px-2 py-3">{{ $team_owner->team_abb }}</td>
                                <td class="md:px-2 py-3">
                                  <img src="{{ asset('storage/teams/logo/' . $team_owner['team_logo_url']) }}" width="30" height="30">
                                </td>

                                {{-- <x-team-logo :teamlogourl="$team->team_logo_url" /> --}}
                                {{-- <td class="md:px-4 py-3">{{ $team_owner->created_at->diffForHumans() }}</td> --}}
                                <td class="md:px-2 py-3">
                                  <button onclick="location.href='{{ route('admin.team_owners.edit', ['team_owner' => $team_owner->id ]) }}'" class="text-white bg-indigo-400 border-0 py-1 px-1 focus:outline-none hover:bg-indigo-500 rounded">編集</button>
                                </td>
                              <form id="delete_{{$team_owner->id}}" method="post" action="{{ route('admin.team_owners.destroy', ['team_owner' => $team_owner->id]) }}">                 
                                @csrf
                                @method('delete')
                                <td class="md:px-4 py-3">
                                  <a href="#" data-id="{{ $team_owner->id }}" onclick="deletePost(this)" class="text-white bg-red-400 border-0 py-1 px-1 focus:outline-none hover:bg-red-500 rounded">削除</a>
                                </td>
                              </form>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          {{ $team_owners->links() }}
                        </div>
                      </div>
                    </section>

                {{--    エロクアント
                    @foreach ($e_all as $e_owner)
                    {{ $e_owner->name }}
                    {{ $e_owner->created_at->diffForHumans() }}
                    @endforeach
                    <br>
                    クエリビルダ
                    @foreach ($q_get as $q_owner)
                    {{ $q_owner->name }}
                    {{ Carbon\Carbon::parse($q_owner->created_at)->diffForHumans() }}
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>
    <script>
      function deletePost(e) {
      'use strict';
      if (confirm('本当に削除してもいいですか?')) { document.getElementById('delete_' + e.dataset.id).submit(); }
      }
    </script>
</x-app-layout>
