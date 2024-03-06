<div class="lg:px-12">
    <h2 class="font-semibold text-3xl text-gray-500 pb-10">
        {{ $vacante->title }}
    </h2>
    <div class="pb-6 border-b md:grid md:grid-cols-2 md:gap-4">
        <div class="mb-4">
            <p class="text-lg font-bold">Company</p>
            <p>{{ $vacante->company }}</p>
        </div>
        <div class="mb-4">
            <p class="text-lg font-bold">Last day to apply</p>
            <p>{{ $vacante->last_day->format('M d, Y') }}</p>
        </div>
        <div class="mb-4">
            <p class="text-lg font-bold">Category</p>
            <p>{{ $vacante->categoria->categoria }} Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, quos? Molestias repudiandae quos aliquam iusto ex officia, quae explicabo amet eligendi! Ex corrupti quam, sapiente nesciunt quia sint repellendus aliquam!</p>
        </div>
        <div class="mb-4">
            <p class="text-lg font-bold">Salary</p>
            <p>{{ $vacante->salario->salario }}</p>
        </div>
    </div>
    <div class="text-xl py-12 grid grid-cols-3 gap-8">
        <div class="col-span-3 md:col-span-2 md:order-2">
            <p class="font-bold mb-2">Job description</p>
            <p>{{ $vacante->description }}</p>
        </div>
        <div class="col-span-3 md:col-span-1 md:order-1">
            <img src="{{ asset('storage/vacantes/' . $vacante->image) }}" alt="{{ 'Imagen vacante ' . $vacante->title }}" class="w-full max-w-sm mx-auto">
        </div>
    </div>
    @guest
        <div class="mt-5 bg-gray-100 p-5 text-center">
            <p>Do you want to apply for this job? <a href="{{ route('login') }}" class="font-bold text-teal-600 hover:opacity-70 transition ease-in-out duration-150">Log in</a>.</p>
        </div>
    @endguest

    @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante"/>
    @endcannot

</div>
