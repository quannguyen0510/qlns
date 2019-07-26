/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import AccountIndex from './components/account/IndexComponent.vue';
import AccountToolbar from './components/account/ToolComponent.vue';

const routes = [
    {
        path: '/',
        components: {
            accountToolbar: AccountToolbar,
            accountIndex: AccountIndex
        }
    },
    {
        path: ''
    }
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')