// Components
import Vue from 'vue'
import VueRouter from 'vue-router'
import UserApp from './user-app/App'

// Views
import Dashboard from './user-app/Dashboard'

// Components
//Vue.component('foo', require('./foo.vue'));

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        redirect: '/dashboard'
    },
    {
        path: '/dashboard',
        name: 'Dashboard',
        component: Dashboard
    }
];

var router = new VueRouter({
    routes: routes
});

new Vue({
    el: '#user-app',
    router,
    template: '<UserApp/>',
    components: { UserApp }
});

