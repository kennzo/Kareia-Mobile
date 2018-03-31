import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);

const state = {
    properties: [],
    // todo: Try to get this from the API?
    statesList: {
        "1": "Alabama",
        "2": "Alaska",
        "3": "Arizona",
        "4": "Arkansas",
        "5": "California",
        "6": "Colorado",
        "7": "Connecticut",
        "8": "Delaware",
        "9": "Florida",
        "10": "Georgia",
        "11": "Hawaii",
        "12": "Idaho",
        "13": "Illinois",
        "14": "Indiana",
        "15": "Iowa",
        "16": "Kansas",
        "17": "Kentucky",
        "18": "Louisiana",
        "19": "Maine",
        "20": "Maryland",
        "21": "Massachusetts",
        "22": "Michigan",
        "23": "Minnesota",
        "24": "Mississippi",
        "25": "Missouri",
        "26": "Montana",
        "27": "Nebraska",
        "28": "Nevada",
        "29": "New Hampshire",
        "30": "New Jersey",
        "31": "New Mexico",
        "32": "New York",
        "33": "North Carolina",
        "34": "North Dakota",
        "35": "Ohio",
        "36": "Oklahoma",
        "37": "Oregon",
        "38": "Pennsylvania",
        "39": "Rhode Island",
        "40": "South Carolina",
        "41": "South Dakota",
        "42": "Tennessee",
        "43": "Texas",
        "44": "Utah",
        "45": "Vermont",
        "46": "Virginia",
        "47": "Washington",
        "48": "West Virginia",
        "49": "Wisconsin",
        "50": "Wyoming",
        "51": "District of Columbia"
    }
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