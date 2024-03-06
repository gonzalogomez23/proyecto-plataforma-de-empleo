<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl sm:text-4xl text-gray-500">
            {{-- <span class="text-gray-400 me-4">{{ __('Edit job') }}</span>{{ $vacante->title }} --}}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl py-8">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-center">
                        <livewire:editar-vacante :vacante="$vacante"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>