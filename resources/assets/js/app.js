
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
import LoggedInMember from './components/LoggedInMember/Main';
import router from './router';
import store from './store';

// Main Vue Component for handling user interaction once signed up.

// This javascript will be the main holder of global components for each SPA aspect.
// At this point, there is only the dashboard.
Vue.component('logged-in-member', LoggedInMember);

const app = new Vue({
    el: '#app',
    router: router,
    store: store,
});

Vue.config.devtools = true;
