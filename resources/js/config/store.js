import {createStore} from "vuex";

const store = createStore({
    state () {
        return {
            userName: undefined,
            token: undefined,
            role: 'buyer'
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
        }
    },
    actions: {

    }
})

export default store;
