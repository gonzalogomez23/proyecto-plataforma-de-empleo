<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl sm:text-4xl text-gray-500">
            {{ __('My jobs') }}
        </h2>
    </x-slot>

    @if (session()->has('mensaje'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <div class="bg-green-100 border-2 border-green-200 text-green-600 rounded-lg px-4 py-3 flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <p class="font-medium">{{ session('mensaje') }}</p>
            </div>
        </div>
    @endif
    
    <livewire:mostrar-vacantes />
</x-app-layout>
