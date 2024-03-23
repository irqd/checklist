// livewire toast 
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


function callToast(event) {
   const toast = document.querySelector('.toast');
   const toastInstance = new bootstrap.Toast(toast);

   const type = 'text-bg-' + (toastTypes.includes(event.detail.type) ? event.detail.type : 'info');

   toast.classList.add(type);
   toast.querySelector('.toast-body').textContent = event.detail.message;

   toastInstance.show();

   toast.addEventListener('hidden.bs.toast', function() {
      toast.classList.remove('text-bg-' + type);
   });
}

document.addEventListener('livewire:navigated', () => {
   document.addEventListener('notify', (event) => {
      callToast(event);
   });

   // if(document.referrer.includes('login')) {
   //    const toast = document.querySelector('.toast');
   //    const toastInstance = new bootstrap.Toast(toast);

   //    const type = 'text-bg-success';

   //    toast.classList.add(type);
   //    toast.querySelector('.toast-body').textContent = 'You have successfully logged in!';

   //    toastInstance.show();

   //    toast.addEventListener('hidden.bs.toast', function() {
   //       toast.classList.remove('text-bg-' + type);
   //    });
   // }
});