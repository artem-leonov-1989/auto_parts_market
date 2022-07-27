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
            selectPart: undefined,
            update: false,
            searchString: '',
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
        PART: state => {
            return state.selectPart
        },
        UPDATE: state => {
            return state.update
        },
        SEARCH: state => {
            return state.searchString
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
        SET_PART: (state, payload) => {
            state.selectPart = payload;
        },
        SET_UPDATE: (state, payload) => {
            state.update = payload;
        },
        SET_SEARCH: (state, payload) => {
            state.searchString = payload;
        },
    },
})

export default store;
