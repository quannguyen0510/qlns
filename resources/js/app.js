/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.mixin({
    data:function(){
        return {
            indexNews:laroute.route('admin.news.index'),
            createNews: laroute.route('admin.news.create'),
            createPost: laroute.route('api.news.store'),
            editNews(id){
                return laroute.route('admin.news.edit', {news:id})
            },
            deleteNews(id){
                return laroute.route('api.news.destroy',{news:id})
            },

        }
    }
})
Vue.component('new-component', require('./components/news/NewsIndex.vue').default);
Vue.component('creat-news', require('./components/news/NewsCreate.vue').default);
Vue.component('edit-news', require('./components/news/NewsEdit').default);

const app = new Vue({
    el: '#app'
});
