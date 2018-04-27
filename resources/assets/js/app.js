
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./jquery-2.1.1');
require('./jquery.bxslider.min');
require('./jquery.min');
require('./main');
require('./nav-hover.min');
require('./modal');
require('./custom');
//require('./scrollreveal.min');
//require('ScrollReveal');
//require('./mdb.min');
//require('./popper.min');

window.Vue = require('vue');






/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

//picture viewer
import VuePictureSwipe from 'vue-picture-swipe';
Vue.component('vue-picture-swipe', VuePictureSwipe);

const app = new Vue({
    el: '#app'
});
