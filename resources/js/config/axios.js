import axios from "axios";

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.common = {'Authorization': `bearer ${localStorage.token}`}

const instance = axios.create({
    headers: {
        'Content-Type': 'application/json',
    },
    baseURL: 'http://auto-market.test/api/',
    timeout: 3000,
});

export {instance};
