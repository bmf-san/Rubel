require('../../css/home/index.css');

// Toggle menu
(function() {
  var burger = document.querySelector('.nav-toggle');
  var menu = document.querySelector('.nav-menu');
  burger.addEventListener('click', function() {
    burger.classList.toggle('is-active');
    menu.classList.toggle('is-active');
  });
})();
