  
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.mixin({
    data: function(){
        return {
            accountIndex: laroute.route('account.index'),
            createAccount: laroute.route('account.create'),
            editAccount(id){
                return laroute.route('account.edit',{account:id})
            },
            storeAccount: laroute.route('api.account.store'),
            updateAccount(id){
                return laroute.route('api.account.update',{account:id})
            },
            deleteAccount(id){
                return laroute.route('api.account.destroy',{account:id})
            },
            getAccount(id){
                return laroute.route('api.account.show',{account:id})
            }
        }
    }
})

Vue.component('account-toolbar',require('./components/account/ToolComponent.vue').default)
Vue.component('account-index',require('./components/account/IndexComponent.vue').default)
Vue.component('account-create',require('./components/account/CreateAccount.vue').default)
Vue.component('account-edit',require('./components/account/EditAccount.vue').default)

const app = new Vue({
    el: '#app'
})
