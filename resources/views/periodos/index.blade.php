<x-app-layout>
    <x-slot name="header">
        {{ __('Periodos') }}
    </x-slot>

    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">
        @livewire('periodos')
    </div>

</x-app-layout>
