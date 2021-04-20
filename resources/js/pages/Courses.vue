<template>
    <div>
        <div class="row d-flex justify-content-between align-items-center">
            <h1>Courses</h1>
            <search-bar></search-bar>
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
        }
    }

</script>
