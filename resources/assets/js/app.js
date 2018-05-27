

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue';
import VeeValidate from 'vee-validate';
import store from './store'
import VueLoading from 'vuex-loading';

Vue.use (VeeValidate, {fieldsBagName: 'veeFields'});
Vue.use(VueLoading);
Vue.use(BootstrapVue);



var VueScrollTo = require('vue-scrollto');
Vue.use(VueScrollTo,{
    duration: 2500,
    offset: -87,
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('loadingSpinner', require('./components/vuex_loading/spinner.vue'));
// Vue.component('example-component', require('./components/ExampleComponent.vue'));
// Vue.component('appContent', require('./components/landing/AppContent.vue'));
// Vue.component('navBar', require('./components/landing/NavBar.vue'));
// Vue.component('home', require('./components/landing/Home.vue'));
// Vue.component('services', require('./components/landing/Services.vue'));
// Vue.component('visas', require('./components/landing/detailVisas.vue'));
// Vue.component('process', require('./components/landing/Process.vue'));
// Vue.component('about', require('./components/landing/About.vue'));
// Vue.component('contact', require('./components/landing/Contact.vue'));
// Vue.component('foot', require('./components/landing/Foot.vue'));
// Vue.component('startVideo', require('./components/landing/StartVideo.vue'));
// Vue.component('modal', require('./components/layouts/Modal.vue'));
// Vue.component('new-process', require('./components/creates/New_process.vue'));
// Vue.component('new-services', require('./components/creates/New_services.vue'));
// Vue.component('new-contact', require('./components/creates/New_contact.vue'));
// Vue.component('new-visa', require('./components/creates/New_visa.vue'));

window.clone = function (obj) {
    return JSON.parse(JSON.stringify(obj));
}

const vueLoading = new VueLoading({useVuex: true, moduleName: 'vuex-example-module'})

import router from './router';

const app = new Vue({
    el: '#app',
    store,
    router,
    vueLoading: vueLoading
});
