<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? 'TODO' }}</title>

        <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet" integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        @yield('styles')

        @vite(['resources/css/app.css'])
    </head>

    <body>
        <div class="wrapper">
            <x-layouts.partials.sidebar />

            <div class="main bg-body-tertiary" id="main">
                <x-navigation.navbar />

                <main class="content p-3">
                    <div class="container">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>

        <x-feedbacks.toast />

        {{-- copyrights --}}
        <a class="visually-hidden" href="https://www.flaticon.com/free-icons/female" title="female icons" data-navigate-once>
            Female icons created by popcornarts - Flaticon
        </a>
        
        @vite(['resources/js/app.js'])

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" data-navigate-once></script>

        @yield('scripts')
    </body>
</html>