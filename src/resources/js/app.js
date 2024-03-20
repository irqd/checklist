import "./bootstrap";

// Sidebar toggle
const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click", function () {
   document.querySelector("#sidebar").classList.toggle("collapsed");
   document.querySelector("#main").classList.toggle("expanded");
   document.querySelector("#navbar").classList.toggle("expanded");
});
