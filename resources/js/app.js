import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

// Vue.component('etq', require('./components/ExampleContent.vue'));
Vue.component('login-form', require('./components/LoginForm.vue'));


var vm = new Vue({
    el: '#app'
});
