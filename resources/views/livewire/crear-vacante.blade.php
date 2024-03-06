<form action="" class="md:w-1/2 space-y-5" wire:submit.prevent="crearVacante">
    <div>
        <x-input-label for="title" :value="__('Job title')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" wire:model="title" :value="old('title')"/>
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>
    <div>
        <select wire:model="salario" id="salario" class="border-gray-300 focus:border-teal-700 focus:ring-teal-700 rounded-md shadow-sm w-full">
            <option>-- Select a salary range --</option>
            @foreach ($salarios as  $salario)
                <option value="{{$salario->id}}">{{$salario->salario}}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('salario')" class="mt-2" />
    </div>
    <div>
        <select wire:model="categoria" id="categoria" class="border-gray-300 focus:border-teal-700 focus:ring-teal-700 rounded-md shadow-sm w-full">
            <option>-- Choose a category --</option>
            @foreach ($categorias as  $categoria)
                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="company" :value="__('Company')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" wire:model="company" :value="old('company')" placeholder="Ex.: Neflix, Uber, Shopify"/>
        <x-input-error :messages="$errors->get('company')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="last_day" :value="__('Last day to apply')" />
        <x-text-input id="last_day" class="block mt-1 w-full" type="date" wire:model="last_day" :value="old('last_day')"/>
        <x-input-error :messages="$errors->get('last_day')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="description" :value="__('Description of the job')" />
        <textarea id="description" class="border-gray-300 focus:border-teal-700 focus:ring-teal-700 rounded-md shadow-sm block mt-1 w-full h-52" type="text" wire:model="description" :value="old('description')">
        </textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="image" :value="__('Image')" />
        <input id="image" class="block mt-1 w-full" type="file" wire:model="image" accept="image/*"/>
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
        @if ($image)
            <div class="py-4">
                <span>Image:</span>
                <img src="{{ $image->temporaryUrl() }}" alt="" class="max-w-[200px] pt-2">
            </div>
        @endif
    </div>
    <x-primary-button>
        {{__('Create job')}}
    </x-primary-button>
</form>