require('./bootstrap');

// stop propagation so the user menu dropdown doesn't disappear when it's clicked
$(document).on('click', '.navbar #navUserMenu', function (e) {
  e.stopPropagation();
});

import Vue from 'vue'
import Vuex from 'vuex'

window.Event = new Vue()

Vue.use(Vuex)
import storeData from './store/index'
const store = new Vuex.Store(
    storeData
)

//Dashboard
import Courses from "./components/dashboard/courses/Courses.vue";
import CategorySelect from './components/dashboard/courses/CategorySelect.vue'
import DashboardHeader from "./components/dashboard/DashboardHeader";
import QuestionsContainer from './components/quiz/QuestionsContainer.vue'
import CreateQuestions from './components/quiz/CreateQuestions.vue'
import StarRating from 'vue-star-rating'
import Cart from "./components/courses/Cart"
import CourseList from './components/courses/CourseList'
import Checkout from './components/courses/Checkout'
import EditQuestions from "./components/quiz/EditQuestions";
import SearchBar from './components/SearchBar'

const app = new Vue({
    el: '#app',
    components: {
        CategorySelect,
        QuestionsContainer,
        EditQuestions,
        CreateQuestions,
        Courses,
        DashboardHeader,
        StarRating,
        Cart,
        CourseList,
        Checkout,
        SearchBar
    },
    store
});
