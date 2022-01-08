@props([
    'options' => "{dateFormat:'d-m-Y', locale:'es', altInput:false, enableTime:false }",
])

<div wire:ignore>
    <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
    x-data="{value: @entangle($attributes->wire('model')), instance: undefined}" x-init="() => {
         $watch('value', value => instance.setDate(value, true))
         instance = flatpickr($refs.input, {{ $options }} );
    }" x-ref="input" type="text" data-input {{ $attributes }} />
</div>
