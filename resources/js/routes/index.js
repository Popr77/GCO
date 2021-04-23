import Home from '../pages/Home.vue'
import Courses from '../pages/Courses.vue'

export default {
    mode: 'history',
    routes: [
        {
            path: '/dashboard',
            name: 'home',
            component: Home
        },
        {
            path: '/dashboard/courses',
            name: 'courses',
            component: Courses
        },
    ]
}
