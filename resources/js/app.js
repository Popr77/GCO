require('./bootstrap');

// toggles the user menu dropdown when the navbar toggles is clicked
document.querySelector('.navbar-toggler').addEventListener('click', () => {
  $('#navUserMenu').toggleClass('show')
})

// stop propagation so the user menu dropdown doesn't disappear when it's clicked
$(document).on('click', '.navbar #navUserMenu', function (e) {
  e.stopPropagation();
});