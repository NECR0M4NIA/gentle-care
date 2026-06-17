<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Anti-Stress
        </h2>
    </x-slot>

    @if(auth()->user() && auth()->user()->role === 'admin')

    @endif

    @if(auth()->user() && auth()->user()->role === 'user')
    <!--  -->
    @endif
</x-app-layout>