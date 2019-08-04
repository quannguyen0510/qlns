/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueSweetalert2 from 'vue-sweetalert2';

import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);

Vue.mixin({
    data: function(){
        return {
            accountIndex: laroute.route('account.index'),
            createAccount: laroute.route('account.create'),
            editAccount(id){
                return laroute.route('account.edit',{account:id})
            },
            accounts: laroute.route('api.account.index'),
            storeAccount: laroute.route('api.account.store'),
            updateAccount(id){
                return laroute.route('api.account.update',{account:id})
            },
            updateAccountRole: laroute.route('api.account.role.update'),
            deleteAccount(id){
                return laroute.route('api.account.destroy',{account:id})
            },
            getAccount(id){
                return laroute.route('api.account.show',{account:id})
            },
            roleManager: laroute.route('admin.role.dashboard')
        }
    }
})

Vue.component('account-toolbar',require('./components/account/ToolComponent.vue').default)
Vue.component('account-index',require('./components/account/IndexComponent.vue').default)
Vue.component('account-create',require('./components/account/CreateAccount.vue').default)
Vue.component('account-edit',require('./components/account/EditAccount.vue').default)

Vue.component('news-index', require('./components/news/newsIndex.vue').default);
Vue.component('news-edit', require('./components/news/NewsEdit.vue').default);
Vue.component('news-create', require('./components/news/NewsCreate.vue').default);
Vue.component('news-detail', require('./components/news/NewsDetail.vue').default);

Vue.component('role-index',require('./components/role/IndexComponent').default)
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
