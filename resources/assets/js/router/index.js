import Vue from 'vue'
import VueRouter from 'vue-router'

// Component files
import Dashboard from '../components/LoggedInMember/Dashboard';
import Properties from '../components/Properties/Properties';
import NewProperty from '../components/Properties/New-Property';
import Property from '../components/Properties/Property';

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'homepage',
        component: Dashboard
    },
    {
        path: '/home',
        name: 'home',
        component: Dashboard
    },
    {
        path: '/new-property',
        name: 'new-property',
        component: NewProperty
    },
    {
        path: '/show/:id',
        name: 'showProperty',
        component: Property
    },
];

export default new VueRouter({
    mode: 'history',
    routes: routes
})