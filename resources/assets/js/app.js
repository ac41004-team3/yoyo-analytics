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


Vue.component('import-data', require('./components/ImportData.vue'));
Vue.component('revert-import', require('./components/RevertImport.vue'));
Vue.component('chart', require('./components/Chart.vue'));
Vue.component('outlet-select', require('./components/OutletSelect.vue'));
Vue.component('delete-button', require('./components/DeleteButton.vue'));
Vue.component('datepicker', require('vuejs-datepicker'));

const app = new Vue({
    el: '#app',
});
