<x-app-layout>
    <x-slot name="header">
        {{ __('Employees') }}
    </x-slot>

    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">



        @livewire('employees')

    </div>

</x-app-layout>
