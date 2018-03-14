
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 *
 * This will be the main app.js file that houses the global components as well
 * as the routing. Dashboard.vue houses the main functionality dealing with
 * what the user interacts with as a member.
 */

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router'

// Main Vue Component for handling user interaction once signed up.
import Dashboard from './components/Dashboard';
import Properties from './components/Properties/Properties';
import NewProperty from './components/Properties/New-Property';

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
];

const router = new VueRouter({
    mode: 'history',
    routes
});

// This javascript will be the main holder of global components for each SPA aspect.
// At this point, there is only the dashboard.
Vue.component('dashboard', Dashboard);

// Passport - OAuth2 components
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);

const app = new Vue({
    el: '#app',
    router: router,
    components: {
        Properties: Properties
    }
});

Vue.config.devtools = true;
