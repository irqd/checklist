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
      <x-feedbacks.toast />

      <main class="d-flex justify-content-center align-items-center py-3 py-md-5">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-12">
                  <x-layouts.partials.guest-header />
               </div>

               <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4 col-xxl-4 mt-5">
                  {{ $slot }}
               </div>
            </div>
         </div>
      </main>

      <x-layouts.partials.footer />

      {{-- copyrights --}}
      <a class="visually-hidden" href="https://www.flaticon.com/free-icons/female" title="female icons">Female icons created by popcornarts - Flaticon</a>
      
      @vite(['resources/js/theme.js', 'resources/js/toast.js'])

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

      @yield('scripts')
   </body>
</html>