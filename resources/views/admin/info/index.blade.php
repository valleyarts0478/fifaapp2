<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            お知らせ
        </h2>
    </x-slot>

    <section class="text-gray-600 body-font">
      
        <div class="container px-5 py-8 mx-auto">
            <p class="text-center">お知らせ一覧</p>
            <x-flash-message status="session('status')" />
            <div class="text-center my-4">
                <button onclick="location.href='{{ route('admin.info.create') }}'" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded-md text-lg">新規登録</button>    
              </div>
              <table class="table-auto">
                <thead>
                  <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>updated_at</th>
                  </tr>
                </thead>
                @foreach($infos as $info)
                <tbody>
                  <tr>
                    <td>{{$info->id}}</td>
                    <td><a class="text-blue-700" href="{{ route('admin.info.edit', ['info' => $info->id]) }}">{{$info->title}}</a></td>
                    <td>{{$info->updated_at->format('Y-m-d')}}</td>
                  </tr>
                </tbody>
                @endforeach
              </table>
              {{ $infos->links() }}
        </div>
    </section>












</x-app-layout>