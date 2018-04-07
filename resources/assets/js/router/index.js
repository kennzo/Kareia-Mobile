import Vue from 'vue'
import VueRouter from 'vue-router'

// Component files
import Dashboard from '../components/LoggedInMember/Dashboard';
import NewProperty from '../components/Properties/New-Property';
import Property from '../components/Properties/Property';
import NewWholesale from '../components/WholesaleExits/New-Wholesale';
import Wholesale from '../components/WholesaleExits/Wholesale';

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
    // Properties
    {
        path: 'property/new',
        name: 'new-property',
        component: NewProperty
    },
    {
        path: 'property/show/:id',
        name: 'showProperty',
        component: Property
    },
    // Wholesale Exits
    {
        path: 'wholesale/new',
        name: 'new-wholesale',
        component: NewWholesale
    },
    {
        path: 'wholesale/show/:id',
        name: 'showWholesale',
        component: Wholesale
    },
];

export default new VueRouter({
    mode: 'history',
    routes: routes
})