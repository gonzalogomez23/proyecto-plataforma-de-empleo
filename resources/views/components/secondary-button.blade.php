<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex whitespace-nowrap items-center px-5 py-2 bg-white border border-gray-300 rounded-md font-semibold text-gray-700 focus:opacity-60 shadow-sm hover:bg-gray-50 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
