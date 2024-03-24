import "./bootstrap";

// Theme toggle
function toggleRootClass() {
   const current = document.documentElement.getAttribute("data-bs-theme");
   const inverted = current == "dark" ? "light" : "dark";
   document.documentElement.setAttribute("data-bs-theme", inverted);
}

function toggleLocalStorage() {
   if (isLight()) {
      localStorage.removeItem("light");
   } else {
      localStorage.setItem("light", "set");
   }
}

function isLight() {
   return localStorage.getItem("light");
}

if (isLight()) {
   toggleRootClass();
}

// Toast toggle
const toastTypes = [
   'primary',
   'secondary',
   'success',
   'danger',
   'warning',
   'info',
];

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
   // theme toggle
   document.querySelector(".theme-toggle").addEventListener("click", () => {
      toggleLocalStorage();
      toggleRootClass();
   });

   // toast toggle 
   const toastElList = document.querySelectorAll('.toast');
   const toastList = [...toastElList].map(toastEl => new bootstrap.Toast(toastEl));
   document.addEventListener('notify', (event) => {
      callToast(event);
   });

   // Sidebar toggle
   const sidebarToggle = document.querySelector("#sidebar-toggle");
   sidebarToggle.addEventListener("click", function () {
      document.querySelector("#sidebar").classList.toggle("collapsed");
      document.querySelector("#main").classList.toggle("expanded");
      document.querySelector("#navbar").classList.toggle("expanded");
   });
});
