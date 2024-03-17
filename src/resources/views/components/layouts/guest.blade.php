<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>{{ $title ?? 'TODO' }}</title>
      <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet" integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   </head>
   <body>
      <x-feedbacks.toast />

      {{ $slot }}

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

      <script>
         document.addEventListener('livewire:init', () => {
            const toastTypes = [
               'primary',
               'secondary',
               'success',
               'danger',
               'warning',
               'info',
            ];
            
            const toastElList = document.querySelectorAll('.toast');
            const toastList = [...toastElList].map(toastEl => new bootstrap.Toast(toastEl));

            document.addEventListener('notify', (event) => {
               const toast = document.querySelector('.toast');
               const toastInstance = new bootstrap.Toast(toast);

               const type = 'text-bg-' + (toastTypes.includes(event.detail.type) ? event.detail.type : 'info');

               toast.classList.add(type);
               toast.querySelector('.toast-body').textContent = event.detail.message;

               toastInstance.show();

               toast.addEventListener('hidden.bs.toast', function() {
                  toast.classList.remove('text-bg-' + type);
               });
            });
         });
      </script>
   </body>
</html>