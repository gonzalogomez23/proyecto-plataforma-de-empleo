<button {{ $attributes->merge(['class' => 'inline-flex items-center px-5 py-2 bg-teal-800 rounded-md font-semibold text-white hover:bg-teal-700 focus:opacity-60 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
