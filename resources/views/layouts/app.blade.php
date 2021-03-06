<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'test') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_green.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">



        @livewireStyles
          <!-- Scripts -->
          <script src="{{ asset('js/app.js') }}" defer></script>
          <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
          <script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>
    </head>
    <body>
        <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-200 font-roboto">
            @include('layouts.navigation')

            <div class="flex overflow-hidden flex-col flex-1">
                @include('layouts.header')

                <main class="overflow-y-auto overflow-x-hidden flex-1 bg-gray-200">
                    <div class="container px-6 py-8 mx-auto">
                        <h3 class="mb-4 text-3xl font-medium text-gray-700">
                            {{ $header }}
                        </h3>

                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
        @livewireScripts
        @stack('js')
    </body>
</html>
