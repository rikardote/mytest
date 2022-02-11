<x-app-layout>
    <x-slot name="header">
        {{ __('Puestos') }}
    </x-slot>

    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">



        @livewire('jobs')

    </div>

</x-app-layout>
