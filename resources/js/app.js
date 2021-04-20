require('./bootstrap');

// stop propagation so the user menu dropdown doesn't disappear when it's clicked
$(document).on('click', '.navbar #navUserMenu', function (e) {
  e.stopPropagation();
});



import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
import routes from './routes'

//Main pages
import App from './components/App.vue'


const app = new Vue({
    el: '#app',
    components: { App },
    router: new VueRouter(routes)
});
