import Vue from 'vue'
import VueRouter from 'vue-router'
import App from './components/App.vue'
import Home from './components/Home.vue'

Vue.use(VueRouter)

const router = new VueRouter({
    saveScrollPosition: true,
    routes: [
        {
            path: '/',
            component: Home
        }
    ]
})

const app = new Vue({
    router,
    render: (h) => h(App)
}).$mount('#app');
