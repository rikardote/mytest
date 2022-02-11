<x-app-layout>
    <x-slot name="header">
        {{ __('Incidencias') }}
    </x-slot>

    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">

        

        @livewire('incidencias')

    </div>

</x-app-layout>
