<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            お知らせ新規作成
        </h2>
    </x-slot>
    
    <div class="max-w-screen-lg py-4 mx-auto">
      <div class="container md:px-8 mx-auto">
    <form method="post" action="{{ route('admin.info.store') }}">
      @csrf
    
      <div class="relative mb-4">
        <label for="title" class="leading-7 text-sm text-gray-600">タイトル</label>
        <input type="text" id="title" name="title" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>

    <div class="relative mb-4">
      <label for="post" class="leading-7 text-sm text-gray-600">内容</label>
      
        <textarea id="editor" name="post" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
      
    </div>
    
    <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録</button>    
</form>
      </div>
    </div>

<script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('editor');
</script>
</x-app-layout>