<template>
    <div class="row text-center">
        <course-item v-for="course in courses"
                     :key="course.id"
            :course="course"
        ></course-item>
    </div>
</template>

<script>
import CourseItem from './CourseItem'

export default {
    name: 'CourseList',
    components: {
        CourseItem
    },
    data() {
        return {
            courses: {}
        }
    },
    props: {
        numCourses: {
            type: Number,
            required: true
        },
        userId: {
            type: Number,
            required: false
        }
    },
    async created() {
        await this.getResults()
    },
    methods: {
        getResults() {
            axios.get('/api/courses/recommended?num=' + this.numCourses + '&userid=' + this.userId)
                .then(response => {
                    this.courses = response.data.data;
                    console.log(this.courses)
                })
                .catch(e => {
                    console.log(e)
                });
        }
    }
}
</script>
