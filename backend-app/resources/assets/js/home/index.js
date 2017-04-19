require('../../css/home/index.css');

// Tabs
(() => {
  const recentBtn = document.querySelector('.recent-btn');
  const popularBtn = document.querySelector('.popular-btn');

  const recentTab = document.querySelector('.recent-tab');
  const popularTab = document.querySelector('.popular-tab');

  // Init
  recentBtn.classList.add('is-active');
  popularTab.style.display = 'none';

  recentBtn.addEventListener('click', () => {
    if (!recentBtn.classList.contains('is-active')) {
      recentBtn.classList.toggle('is-active');
      popularBtn.classList.toggle('is-active');
      recentTab.style.display = 'block';
      popularTab.style.display = 'none';
    }
  });

  popularBtn.addEventListener('click', () => {
    if (!popularBtn.classList.contains('is-active')) {
      popularBtn.classList.toggle('is-active');
      recentBtn.classList.toggle('is-active');
      popularTab.style.display = 'block';
      recentTab.style.display = 'none';
    }
  });
})();
