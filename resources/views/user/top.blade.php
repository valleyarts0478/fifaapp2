<x-front.app>
    top
    <x-slot name="header">ヘッダー1</x-slot>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
           <a href="{{ route('team_owner.login') }}" class="text-sm text-gray-700 underline">Log in</a>
        </div>
    </div>
</x-front.app>
