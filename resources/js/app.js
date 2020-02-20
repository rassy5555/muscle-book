/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
window.Vue = require('vue');

//多言語化
import VueI18n from 'vue-i18n';
import data from './ja.js';
  
//トリミング
import Croppa from 'vue-croppa';

Vue.use(Croppa);
Vue.use(VueI18n);
console.log(data);
const i18n = new VueI18n({
    locale: 'ja',
    messages: data
});


require('./bootstrap');
require('./jQuery');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('profile-component', require('./components/profile/ProfileComponent.vue').default);
Vue.component('profile-edit-component', require('./components/profile/ProfileEditComponent.vue').default);
Vue.component('password-change-component', require('./components/profile/PasswordChangeComponent.vue').default);
Vue.component('profile-image-edit-component', require('./components/profile/ProfileImageEditComponent.vue').default);
Vue.component('post-show-component', require('./components/post/postShowComponent.vue').default);

Vue.component('send-password-component', require('./components/password/SendPasswordComponent.vue').default);
Vue.component('reset-password-component', require('./components/password/ResetPasswordComponent.vue').default);

Vue.component('user-detail-component', require('./components/user/UserDetailComponent.vue').default);




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    i18n: i18n,
});
