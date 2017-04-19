require('../css/app.css');
require('../../../node_modules/font-awesome/css/font-awesome.css');
require('../../../node_modules/bulma/css/bulma.css');
require('../../../node_modules/highlight.js/styles/atom-one-dark.css');

// Toggle menu
(() => {
  const burger = document.querySelector('.nav-toggle');
  const menu = document.querySelector('.nav-menu');

  burger.addEventListener('click', () => {
    burger.classList.toggle('is-active');
    menu.classList.toggle('is-active');
  });
})();
