<x-front.app>

  <div class="bg-white sm:py-8 lg:py-4">
    <section class="text-gray-600 font-sans">
        <div class="container max-w-4xl px-4 mx-auto md:px-8">

            <h2 class="text-2xl bg-gray-100 p-2">{{ $conventionId->id }}th結果</h2>
            <!--総合優勝-->
            @if ($sougou_score1 == null or $sougou_score2 == null)
            @else
                <div class="py-2 text-2xl font-bold text-center">総合優勝：
                    @if ($sougou_score1 > $sougou_score2)
                        {{ $convention_results1->team_name }}
                    @elseif($sougou_score1 < $sougou_score2)
                        {{ $convention_results2->team_name }}
                    @elseif($sougou_score1 === $sougou_score2)
                        @if ($convention_results1->pk_score > $convention_results2->pk_score)
                            {{ $convention_results1->team_name }}
                        @else
                            {{ $convention_results2->team_name }}
                        @endif
                    @endif
                </div>
            @endif

            @if ($sougou_score1 == null or $sougou_score2 == null)
            <div class="text-center text-xs">総合優勝決定戦</div>
            @else
                <div class="text-center">最終スコア</div>
                <div class="flex justify-center items-center">
                    <div class="w-8">
                        <img class="w-8 h-8" src="{{ asset('storage/teams/logo/' . $team_names1->team_logo_url) }}">
                    </div>
                    <div class="w-20 text-3xl text-center">{{ $sougou_score1 }}:{{ $sougou_score2 }}</div>
                    <div class="w-8">
                        <img class="w-8 h-8" src="{{ asset('storage/teams/logo/' . $team_names2->team_logo_url) }}">
                    </div>
                </div>
                <div class="mb-4 text-center">
                    {{-- @if ($convention_results1->pk_score == null or $convention_results2->pk_score == null) --}}
                    @if ($pk_score1 == null)
                    @else
                        <div class="text-xs">PK or GG</div>
                        {{-- <div>({{ $convention_results1->pk_score }}-{{ $convention_results2->pk_score }})</div> --}}
                        <div>3試合目:({{ $pk_score1 }}-{{ $pk_score2 }})</div>
                    @endif
                </div>
            @endif
            <div class="flex justify-center items-center mb-4">
                <!--1試合目-->
                <div class="mr-4">
                    <div class="text-center">1試合目</div>
                    <div class="flex justify-center items-center">
                        <div class="w-12">
                            <img class="w-8 h-8"
                                src="{{ asset('storage/teams/logo/' . $team_names1->team_logo_url) }}">
                        </div>
                        <div class="text-lg">{{ $convention_results1->home_score }}</div>
                    </div>
                    <div class="flex justify-center items-center">
                        <div class="w-12">
                            <img class="w-8 h-8"
                                src="{{ asset('storage/teams/logo/' . $team_names2->team_logo_url) }}">
                        </div>
                        <div class="text-lg">{{ $convention_results2->away_score }}</div>
                    </div>
                </div>

                <!--2試合目-->
                <div class="ml-4">
                    <div class="text-center">2試合目</div>
                    <div class="flex justify-center items-center">
                        <div class="w-12">
                            <img class="w-8 h-8"
                                src="{{ asset('storage/teams/logo/' . $team_names2->team_logo_url) }}">
                        </div>
                        <div class="text-lg">{{ $convention_results2->home_score }}</div>
                    </div>
                    <div class="flex justify-center items-center">
                        <div class="w-12">
                            <img class="w-8 h-8"
                                src="{{ asset('storage/teams/logo/' . $team_names1->team_logo_url) }}">
                        </div>
                        <div class="text-lg">{{ $convention_results1->away_score }}</div>
                    </div>
                </div>
            </div>

            <!--Agroup-->
            <div class="px-2">
                <div class="text-lg text-center">Agroup優勝</div>
                <div class="border border-1 border-ral-400 rounded-md py-4 px-4">
                    <div class="flex justify-center items-center">
                        <div class=""><img class="w-16 h-16"
                                src="{{ asset('storage/teams/logo/' . $team_names1->team_logo_url) }}">
                        </div>

                    </div>
                    <div class="mt-1 text-center text-2xl">{{ $convention_results1->team_name }}</div>
                    <div class="mt-2 text-center">
                        {{ $convention_results1->win }}勝{{ $convention_results1->lose }}敗{{ $convention_results1->draw }}分
                    </div>
                </div>
            </div>
            <!--Bgroup-->
            <div class="mt-4 px-2">
                <div class="text-lg text-center">Bgroup優勝</div>
                <div class="border border-1 border-ral-400 rounded-md py-4 px-4">
                    <div class="flex justify-center items-center">
                        <div class=""><img class="w-16 h-16"
                                src="{{ asset('storage/teams/logo/' . $team_names2->team_logo_url) }}">
                        </div>
                    </div>
                    <div class="mt-1 text-center text-2xl">{{ $convention_results2->team_name }}</div>
                    <div class="mt-2 text-center">
                        {{ $convention_results2->win }}勝{{ $convention_results2->lose }}敗{{ $convention_results2->draw }}分
                    </div>
                </div>
            </div>
            <div class="mt-4 px-2">
                <div class="text-lg text-center">得点王</div>
                <div class="border border-1 border-ral-400 rounded-md py-4 px-4">
                    <div class="mx-auto">
                        <div class="w-full border-b-2 border-ral-300 font-bold">Agroup</div>
                        <div class="mt-2 text-center">
                            <div class="font-bold">{{ $player_rank_goal1->player_name }}</div>
                            <div>{{ $player_rank_goal1->goals }}ゴール</div>
                            <div class="flex justify-center items-center">
                                <div class=""><img class="w-6 h-6"
                                        src="{{ asset('storage/teams/logo/' . $player_rank_goal1->team_logo_url) }}">
                                </div>
                                <div>({{ $player_rank_goal1->team_name }})</div>
                            </div>
                        </div>
                    </div>
                    <div class="mx-auto">
                        <div class="w-full border-b-2 border-ral-300 font-bold">Bgroup</div>
                        <div class="mt-2 text-center">
                            <div class="font-bold">{{ $player_rank_goal2->player_name }}</div>
                            <div>{{ $player_rank_goal2->goals }}ゴール</div>
                            <div class="flex justify-center items-center">
                                <div class=""><img class="w-6 h-6"
                                        src="{{ asset('storage/teams/logo/' . $player_rank_goal2->team_logo_url) }}">
                                </div>
                                <div>({{ $player_rank_goal2->team_name }})</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 px-2">
                <div class="text-lg text-center">アシスト王</div>
                <div class="border border-1 border-ral-400 rounded-md py-4 px-4">
                    <div class="mx-auto">
                        <div class="w-full border-b-2 border-ral-300 font-bold">Agroup</div>
                        <div class="mt-2 text-center">
                            <div class="font-bold">{{ $player_rank_assist1->player_name }}</div>
                            <div>{{ $player_rank_assist1->assists }}アシスト</div>
                            <div class="flex justify-center items-center">
                                <div class=""><img class="w-6 h-6"
                                        src="{{ asset('storage/teams/logo/' . $player_rank_assist1->team_logo_url) }}">
                                </div>
                                <div>({{ $player_rank_assist1->team_name }})</div>
                            </div>
                        </div>
                    </div>
                    <div class="mx-auto">
                        <div class="w-full border-b-2 border-ral-300 font-bold">Bgroup</div>
                        <div class="mt-2 text-center">
                            <div class="font-bold">{{ $player_rank_assist2->player_name }}</div>
                            <div>{{ $player_rank_assist2->assists }}アシスト</div>
                            <div class="flex justify-center items-center">
                                <div class=""><img class="w-6 h-6"
                                        src="{{ asset('storage/teams/logo/' . $player_rank_assist2->team_logo_url) }}">
                                </div>
                                <div>({{ $player_rank_assist2->team_name }})</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


</x-front.app>