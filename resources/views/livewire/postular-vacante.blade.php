<div class="border-t py-10">
    <h3 class="font-bold text-2xl text-gray-800 mb-6">Apply for this job</h3>


    <form action="" wire:submit.prevent='postularme'>
        <div class="mb-6">
            <x-input-label for="cv" :value="__('Curriculum Vitae (PDF)')" class="mb-4"/>
            <input id="cv" type="file" wire:model="cv" accept=".pdf"/>
        </div>
        @error('cv')
            <x-input-error :messages="$errors->get('cv')" class="mb-6" />
        @enderror
        <x-primary-button>
            {{__('Apply')}}
        </x-primary-button>
    </form>
    
    @if (session()->has('mensaje'))
        <div class="max-w-7xl mx-auto mt-6">
            <div class="bg-green-100 border-2 border-green-200 text-green-600 rounded-lg px-4 py-3 flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <p class="font-medium">{{ session('mensaje') }}</p>
            </div>
        </div>
    @endif
</div>
