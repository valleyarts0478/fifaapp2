<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            お知らせ編集
        </h2>
    </x-slot>

    <section class="text-gray-600 body-font">
        <x-flash-message status="session('status')" />
        <div class="container px-5 py-24 mx-auto flex">
          <div class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col mx-auto w-full mt-10 md:mt-0 relative z-10 shadow-md">
            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">お知らせ編集</h2>
            
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="post" action="{{ route('admin.info.update', ['info' => $info->id]) }}">
              @csrf
            <div class="relative mb-4">
              <label for="title" class="leading-7 text-sm text-gray-600">タイトル</label>
              <input type="text" id="title" name="title" value="{{ $info->title }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
              <label for="post" class="leading-7 text-sm text-gray-600">内容</label>
              <textarea id="editor" name="post" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $info->post }}</textarea>
            </div>
            
            <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新</button>    
        </form>
          </div>
        </div>
      </section>

      <script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
      <script>
          CKEDITOR.replace('editor');
      </script>


</x-app-layout>