<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl sm:text-4xl text-gray-500">
            {{ __('Applicants for') }} <span class="text-gray-900">{{ $vacante->title }}</span>
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl px-4">
            {{-- <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex justify-center"> --}}
                    @forelse ($vacante->candidatos as $candidato)
                    <div class="py-6 md:px-6 border-b last:border-0 flex flex-col md:flex-row gap-4">
                        <div class="space-y-2 grow">
                            {{-- <a href="{{ route('vacantes.show', $vacante->id) }}"> --}}
                                <div class="flex items-baseline flex-wrap">
                                    <p class="text-xl font-bold text-gray-900 me-3">{{ $candidato->user->name }}</p>
                                    <p class="text-md font-bold text-gray-700">{{ $candidato->user->email }}</p>
                                </div>
                                {{-- <p class="text-xl font-bold text-gray-500 mb-1">There is a new applicant for <span class="text-gray-900">{{ $notificacion->data['nombre_vacante'] }}</span></p> --}}
                                <p class="text-sm text-gray-500">{{ $candidato->created_at->diffForHumans() }}</p>
                            {{-- </a> --}}
                        </div>
                        <div class="flex flex-wrap items-center gap-2">
                            <a href="{{asset('storage/cv/' . $candidato->cv)}}" target="_blank" rel="noreferrer noopener">
                                <x-primary-button>
                                    View CV
                                </x-primary-button>
                            </a>
                        </div>
                    </div>
                    @empty
                    <p class="text-center font-semibold px-4 py-6 text-lg text-gray-500">No applicants yet.</p>
                    @endforelse
                {{-- </div>
            </div> --}}
        </div>
    </div>
</x-app-layout>