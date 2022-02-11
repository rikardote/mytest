<x-app-layout>
    <x-slot name="header">
        {{ __('Departments') }}
    </x-slot>

    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">

        

        @livewire('departments')

    </div>

</x-app-layout>
