import {createStore} from "vuex";

const store = createStore({
    state () {
        return {
            userName: undefined,
            token: undefined,
            role: 'buyer',
            registered: false,
        }
    },
    getters: {
        TOKEN: state => {
            return state.token;
        },
        USERNAME: state => {
            return state.userName
        },
        ROLE: state => {
            return state.role
        },
        REGISTERED: state => {
            return state.registered
        }
    },
    mutations: {
        SET_TOKEN: (state, payload) => {
            state.token = payload;
        },
        SET_USERNAME: (state, payload) => {
            state.userName = payload;
        },
        SET_ROLE: (state, payload) => {
            state.role = payload;
        },
        SET_REGISTERED: (state, payload) => {
            state.registered = payload;
        },
    },
    actions: {

    }
})

export default store;
