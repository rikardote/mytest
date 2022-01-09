<x-app-layout>
    <x-slot name="header">
        {{ __('Quincenas') }}
    </x-slot>

    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">
        @livewire('qnas')
    </div>

</x-app-layout>
