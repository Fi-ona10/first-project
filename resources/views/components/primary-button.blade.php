<!-- resources/views/components/primary-button.blade.php -->
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 rounded-2xl text-white bg-purple-600 hover:bg-purple-700 shadow-md focus:outline-none focus:ring-2 focus:ring-purple-300']) }}>
    {{ $slot }}
</button>
