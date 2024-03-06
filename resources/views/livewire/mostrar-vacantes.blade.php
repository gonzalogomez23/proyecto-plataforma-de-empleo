<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl px-4">
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
                    <a href="{{ route('candidatos.index', $vacante) }}">
                        <x-secondary-button>
                            Applicants
                        </x-secondary-button>
                    </a>
                    <a href="{{ route('vacantes.edit', $vacante->id) }}">
                        <x-secondary-button>
                            Edit
                        </x-secondary-button>
                    </a>
                    <button wire:click="$dispatch('mostrarAlerta', [{{ $vacante->id }}])" class="inline-flex items-center px-5 py-2 rounded-md font-semibold bg-red-100 text-red-800 hover:bg-red-200 px-2 transition ease-in-out duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 py-0.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                    </button>
                </div>
            </div>
        @empty
            <p class="text-center font-semibold px-4 py-6 text-lg text-gray-500">No job postings yet.</p>
        @endforelse
        {{ $vacantes->links() }}
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('mostrarAlerta', vacanteId => {
            Swal.fire({
                title: "Are you sure you want to delete this job?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {

                //Eliminar la vacante
                Livewire.dispatch('eliminarVacante', vacanteId)

                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your job has been deleted.",
                        icon: "success"
                    });
                }
            });
            })
    </script>
@endpush
