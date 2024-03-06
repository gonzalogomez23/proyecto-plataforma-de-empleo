<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl px-4">
        
                
        <livewire:filtrar-vacantes>
        @forelse ($vacantes as $vacante)
            <div class="py-6 md:px-6 border-b last:border-0 flex flex-col md:flex-row gap-4">
                <div class="div space-y-2 grow">
                    <a href="{{ route('vacantes.show', $vacante->id) }}">
                        <h2 class="text-2xl font-bold text-gray-900">{{ $vacante->title }}</h2>
                        <p class="text-lg font-bold text-gray-500 mb-1">{{ $vacante->company }}</p>
                        <p class="text-sm text-gray-500">Until <span class="font-bold">{{ $vacante->last_day->format('M d, Y') }}</span></p>
                    </a>
                </div>
                <div class="flex flex-wrap items-center gap-2">
                    <a href="{{ route('vacantes.show', $vacante->id) }}">
                        <x-secondary-button>
                            View job
                        </x-secondary-button>
                    </a>
                </div>
            </div>
        @empty
            <p class="text-center font-semibold px-4 py-6 text-lg text-gray-500">No job postings yet.</p>
        @endforelse
        {{ $vacantes->links() }}
    </div>
</div>