import {createStore} from "vuex";

const store = createStore({
    state () {
        return {
            userName: undefined,
            token: undefined,
            role: 'buyer',
            selectBrand: undefined,
            selectType: undefined,
            selectCategory: undefined,
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
        BRAND: state => {
            return state.selectBrand
        },
        TYPE: state => {
            return state.selectType
        },
        CATEGORY: state => {
            return state.selectCategory
        },
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
        SET_BRAND: (state, payload) => {
            state.selectBrand = payload;
        },
        SET_TYPE: (state, payload) => {
            state.selectType = payload;
        },
        SET_CATEGORY: (state, payload) => {
            state.selectCategory = payload;
        },
        SET_NEWRECORD: (state, payload) => {
            state.newRecord = payload;
        },
    },
    actions: {

    }
})

export default store;
