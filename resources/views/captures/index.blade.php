<x-app-layout>
    <x-slot name="header">
        {{ __('Captura de incidencias') }}
    </x-slot>

    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">
        @livewire('captures')
    </div>

</x-app-layout>
