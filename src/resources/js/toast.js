// livewire toast 
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