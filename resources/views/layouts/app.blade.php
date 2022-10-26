<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/jalaliDataPicker.min.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    {{-- Scripts --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/jalaliDataPicker.min.js') }}"></script>
</head>

<body class="tracking-normal font-light" dir="rtl">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.NavBar')

        <!-- Page Content -->
        <div class="flex w-full">
            {{-- Sidebar --}}
            @include('layouts.SideBar')

            {{-- Main Website and content --}}
            <main class="w-10/12">
                <div class="py-4 px-8">
                    @if (isset($header))
                        <header>
                            <h2 class="font-medium text-xl text-gray-800">
                                {{ $header }}
                            </h2>
                        </header>
                    @endif
                    <div class="py-6 px-4">
                        <div class="px-6 py-8 bg-white w-full rounded-xl mx-auto shadow-sm border border-gray-100">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>

</body>

</html>
