
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

Vue.use(VueRouter);
//
// import VueAxios from 'vue-axios';
// import axios from 'axios';
// Vue.use(VueAxios, axios);
//
// const router = new VueRouter({ mode: 'history'});
// new Vue(Vue.util.extend({ router })).$mount('#app');


import Dashboard from './components/Dashboard';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// This javascript will be the main holder of global components for each SPA aspect.
// At this point, there is only the dashboard.
Vue.component('dashboard', Dashboard);


const app = new Vue({
    el: '#app'
});

Vue.config.devtools = true;
