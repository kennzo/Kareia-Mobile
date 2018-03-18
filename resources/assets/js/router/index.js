import Vue from 'vue'
import VueRouter from 'vue-router'

// Component files
import Properties from '../components/Properties/Properties';
import NewProperty from '../components/Properties/New-Property';
import Property from '../components/Properties/Property';

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'homepage',
        component: Properties
    },
    {
        path: '/home',
        name: 'home',
        component: Properties
    },
    {
        path: '/new-property',
        name: 'new-property',
        component: NewProperty
    },
    {
        path: '/show',
        name: 'show',
        component: Property
    },
];

export default new VueRouter({
    mode: 'history',
    routes: routes
})