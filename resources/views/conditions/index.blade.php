<x-app-layout>
    <x-slot name="header">
        {{ __('Condiciones') }}
    </x-slot>

    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">

        

        @livewire('conditions')

    </div>

</x-app-layout>
