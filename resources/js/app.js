require('./bootstrap');

// stop propagation so the user menu dropdown doesn't disappear when it's clicked
$(document).on('click', '.navbar #navUserMenu', function (e) {
  e.stopPropagation();
});

import Vue from 'vue'

import CategorySelect from './components/courses/CategorySelect.vue'

const app = new Vue({
    el: '#app',
    components: {
        CategorySelect
    }
});
