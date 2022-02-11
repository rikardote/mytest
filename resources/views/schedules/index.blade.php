<x-app-layout>
    <x-slot name="header">
        {{ __('Horarios') }}
    </x-slot>

    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">
        @livewire('schedules')
    </div>

</x-app-layout>
