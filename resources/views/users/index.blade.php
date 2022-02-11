<x-app-layout>
    <x-slot name="header">
        {{ __('Users') }}
    </x-slot>

    <div class="inline-block overflow-hidden min-w-full rounded-lg shadow">

        @livewire('usuarios')
        
    </div>

</x-app-layout>
