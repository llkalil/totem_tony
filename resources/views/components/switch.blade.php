@php
    $id=uniqid('select_')
@endphp

<div wire:ignore class="flex items-center mt-2" x-data="{'value_{{ $id }}':{{ $attributes['checked'] ?'true':'false' }} }">
    <label for="{{ $id }}" class="flex items-center cursor-pointer">
        <div class="relative">
            <input id="{{ $id }}" {{ $attributes }} type="checkbox" class="sr-only" x-model="value_{{ $id }}" />
            <div class="w-10 h-4 bg-gray-300 hover:shadow-lg rounded-full shadow-inner line transition shadow"></div>
            <div class="dot absolute w-6 h-6 bg-gray-50 p-1 rounded-full shadow-lg -left-1 -top-1 transition">
                <svg x-show="!value_{{ $id }}" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <svg x-show="value_{{ $id }}" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>
        </div>
        <div class="ml-3 text-gray-700">
            {{ $slot ?? '' }}
        </div>
    </label>
</div>

@error($attributes->wire('model')->value)
<p class="mt-2 text-sm text-red-600">{{ $message }}</p>
@enderror