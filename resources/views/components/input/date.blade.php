<div x-data x-init="new Pikaday({ field: $refs.input, format: 'MM/DD/YYYY' })" @change="$dispatch('input', $event.target.value)" class="max-w-lg flex rounded-md shadow-sm">
    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
        <x-heroicon-s-calendar class="h-5 w-5 text-gray-400" />
    </span>

    <input {{ $attributes }} x-ref="input" class="rounded-none rounded-r-md flex-1 form-input block w-full min-w-0 transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
</div>

@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
@endpush

@push('scripts')
<script src="https://unpkg.com/moment"></script>
<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
@endpush