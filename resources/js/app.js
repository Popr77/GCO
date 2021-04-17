require('./bootstrap');

// stop propagation so the user menu dropdown doesn't disappear when it's clicked
$(document).on('click', '.navbar #navUserMenu', function (e) {
  e.stopPropagation();
});

import Vue from 'vue'

//Main pages
import HelloWorld from './views/HelloWorld.vue'


const app = new Vue({
    el: '#app',
    components: { HelloWorld }
});

