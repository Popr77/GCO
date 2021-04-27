<template>
    <div>
        <div class="row d-flex justify-content-between align-items-center mb-4">
            <div class="d-flex align-items-center">
                <h1>Courses</h1>
                <router-link
                    active-class="active"
                    exact :to="{ name: 'newcourse' }"
                    class="btn btn-primary ml-4">Add Course</router-link>

            </div>
            <search-bar @searchValueChanged=""></search-bar>
        </div>

        <course-list></course-list>

    </div>

</template>

<script>
    import CourseList from '../components/courses/CourseList.vue'
    import SearchBar from '../components/SearchBar.vue'

    export default {
        name: 'Courses',
        components: {
            CourseList,
            SearchBar
        },
        methods: {

        }
    }

</script>
