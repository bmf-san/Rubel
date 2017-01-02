import Vue from 'vue';
import Router from 'vue-router';
import App from './components/App.vue';

// Install some plugins
Vue.use(Router);
Vue.use(Resource);

export var router = new Router({
  history: true
});

router.map({
  '/': {
    name: 'home',
    component: HomeView
  }
});

// Redirect 404 pages
router.redirect({
  '*': '/'
});

router.start(App, 'app');
