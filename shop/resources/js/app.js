
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('carts', require('./components/carts.vue'));
Vue.component('order-create', require('./components/order.vue'));

// import Vue from 'vue';

// import VueResource from 'vue-resource';
// Vue.use(VueResource);
// import VueRouter from 'vue-router';
// Vue.use(VueRouter);

// import routes from 'routes';    // 路由配置文件

// // 实例化路由
// const router = new VueRouter({
//     routes
// });

const app = new Vue({
        el: '#app',
        // 定义购物车数据
        

});
