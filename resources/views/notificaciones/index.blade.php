<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl sm:text-4xl text-gray-500">
            {{ __('My notifications') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl px-4">
            @forelse ($notificaciones as $notificacion)
                <div class="py-6 md:px-6 border-b last:border-0 flex flex-col md:flex-row gap-4">
                    <div class="div space-y-2 grow">
                        <p class="text-xl font-bold text-gray-500 mb-1">There is a new applicant for <span class="text-gray-900">{{ $notificacion->data['nombre_vacante'] }}</span></p>
                        <p class="text-sm text-gray-500">{{ $notificacion->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="flex flex-wrap items-center gap-2">
                        <a href="{{ route('candidatos.index', $notificacion->data['id_vacante']) }}">
                            <x-primary-button>
                                View applicants
                            </x-primary-button>
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-center font-semibold px-4 py-6 text-lg text-gray-500">Notifications are empty.</p>
            @endforelse
            {{-- {{ $notificaciones->links() }} --}}
        </div>
    </div>
</x-app-layout>