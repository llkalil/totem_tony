@props(['disabled' => false])
<input type="hidden" class="border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red">
<input
        {{ $disabled ? 'disabled' : '' }}
        {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200  focus:ring-opacity-50 rounded-md shadow-sm'
.
($errors->has($attributes->whereStartsWith('wire:model')->first())?' border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red':'')]) !!} wire:loading.class="is-loading">

@error($attributes->whereStartsWith('wire:model')->first())
<p class="mt-2 text-sm text-red-600">{{ $message }}</p>
@enderror