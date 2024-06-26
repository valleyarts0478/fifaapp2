<footer class="max-w-screen-lg mx-auto text-gray-600 body-font">
    <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
      <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
        <div class="-ml-8 mr-1 w-8 h-8">
          <img src="{{ asset('storage/teams/' . "RALE_logo.png") }}">
        </div>
        <span class="text-ral-400 text-xl font-bold">RAL-E</span>
      </a>
      <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2024 RAL-E
        <a href="https://twitter.com/ral_efl" class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">@ral_efl</a>
        <a href="https://twitter.com/RALE_TEDs" class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">@RALE_TEDs</a>
      </p>
      <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
        <span class="text-sm mr-2">ツイート用</span>
      <a href="https://twitter.com/intent/tweet?hashtags=RALE,FC24,プロクラブ" class="text-ral-400 twitter-hashtags-btn" target="_blank">
        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
          <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
        </svg>
      </a>
    </span>
    </div>
   
  </footer>
  <script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('editor');
</script>