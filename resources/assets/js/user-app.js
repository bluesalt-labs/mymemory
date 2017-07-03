// Components
import Vue from 'vue'
import VueRouter from 'vue-router'
import UserApp from './user-app/App'

// Views
import Dashboard from './user-app/Dashboard'
import ToDoList from './user-app/ToDoList'
import Notes from './user-app/Notes'
import Calendar from './user-app/Calendar'

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
    },
    {
        path: '/calendar',
        name: 'Calendar',
        component: Calendar
    },
    {
        path: '/todo-list',
        name: 'ToDoList',
        component: ToDoList
    },
    {
        path: '/notes',
        name: 'Notes',
        component: Notes
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

