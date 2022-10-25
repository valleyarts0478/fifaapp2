<x-front.app>

    <ul class="accordion-area">
        <li>
            <section class="rounded-md">
                <h3 class="title">お知らせ</h3>
                <div class="box text-sm">
                    <ul class="ml-4 list-disc">
                        <li>運営からのお知らせを掲載しています。</li>
                    </ul> 
                </div>
            </section>
        </li>
        <li>
            <section class="rounded-md">
                @foreach($infolist as $info)
                <h3 class="title flex justify-center items-center">{{$info->title}}<span class="ml-auto text-sm text-gray-400">{{$info->created_at->format('Y-m-d')}}</span></h3>
                <div class="box text-sm">
                    <ul class="ml-4 list-disc">
                        {{-- <li>{!! nl2br(htmlspecialchars($info->post)) !!}</li>--}}
                        <li>{!! $info->post !!}</li>
                    </ul> 
                </div>
                @endforeach
            </section>
        </li>
    </ul>

        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="{{mix('js/tab.js')}}"></script>
        <script src="{{mix('js/accordion.js')}}"></script>

</x-front.app>