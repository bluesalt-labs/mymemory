// Vue Components
import Vue from 'vue'
import VueRouter from 'vue-router'
import UserApp from './user-app/App'

// Views
import Dashboard from './user-app/Dashboard'
import Calendar from './user-app/Calendar'
import ToDoList from './user-app/ToDoList'
import Journal from './user-app/Journal'
import Notes from './user-app/Notes'

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
        path: '/journal',
        name: 'Journal',
        component: Journal
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

