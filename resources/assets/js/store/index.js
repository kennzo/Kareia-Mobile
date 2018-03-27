import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);

const state = {
    properties: []
};

// asynchronous operations
const actions = {
};

// isolated data mutations
const mutations = {
    setProperties() {
        axios.get('/api/property')
            .then(
                response => {
                    console.log(response);
                    state.properties = response.data.properties;
                }
            )
            .catch(
                error => console.log(error)
            );
    },
};

// reusable data accessors
const getters = {
    getProperties: state => state.properties
};


const store = new Vuex.Store({
    state,
    actions,
    mutations,
    getters
});

export default store;