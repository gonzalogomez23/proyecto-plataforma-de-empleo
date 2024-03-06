<div class="pb-10">
    <h2 class="text-2xl md:text-4xl text-gray-600 text-center font-extrabold my-5">Search and filter jobs</h2>

    <div class="max-w-7xl mx-auto">
        <form wire:submit.prevent='leerDatosFormulario'>
            <div class="md:grid md:grid-cols-3 gap-5">
                <div class="mb-5">
                    <label 
                        class="block mb-1 text-sm text-gray-700 uppercase font-bold "
                        for="termino">Key words
                    </label>
                    {{-- <input 
                        id="termino"
                        type="text"
                        placeholder="Search by words: ex. Laravel"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                    /> --}}
                    <x-text-input id="termino" class="block mt-1 w-full" placeholder="Search by words: ex. Laravel" type="text" wire:model="termino" :value="old('termino')"/>
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Category</label>
                    <select class="border-gray-300 focus:border-teal-700 focus:ring-teal-700 rounded-md shadow-sm w-full" wire:model='categoria'>
                        <option>--Select--</option>
            
                        @foreach ($categorias as $categoria )
                            <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 uppercase font-bold">Monthly salary</label>
                    <select class="border-gray-300 focus:border-teal-700 focus:ring-teal-700 rounded-md shadow-sm w-full" wire:model='salario'>
                        <option>-- Select --</option>
                        @foreach ($salarios as $salario)
                            <option value="{{ $salario->id }}">{{$salario->salario}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                {{-- <input 
                    type="submit"
                    class="bg-indigo-500 hover:bg-indigo-600 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-full md:w-auto"
                    value="Search"
                /> --}}
                <x-primary-button type="submit">
                    Search
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
