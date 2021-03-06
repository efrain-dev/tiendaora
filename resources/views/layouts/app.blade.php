<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="{{asset('img/logo.png')}}" />

        <style>    .card {
                overflow: hidden;
                transition: all 0.25s;
            }

            .card:hover {
                transform: translateY(-15px);
                box-shadow: 0 12px 16px rgba(0, 0, 0, 0.2);
            }
        </style>
        <title>TiendaOracle</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles
        <link rel="stylesheet" href="{{ mix('css/fontawesome.css') }}">
        <!-- Scripts -->


    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

            @if(session('status'))
                <script>
                        Swal.fire({
                            position: 'center',
                            icon: '{{session('status')}}',
                            titleText: '{{session('statusT')}}',
                            showConfirmButton: false,
                            timer: 1500
                        })
                </script>
            @endif
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ asset('js/general.js') }}" defer></script>
        @livewireScripts
        @stack('scripts')

    </body>
</html>
