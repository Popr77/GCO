<template>
    <div class="row text-center">
        <p class="text-center mt-5 mx-auto" v-if="courses.length <= 0">No courses to show :(</p>
        <course-item v-else v-for="(course, index) in courses" data-aos="fade-up"
                     :key="index"
                     :course="course"
        ></course-item>

        <mugen-scroll v-if="!isRelatedCourses" :handler="fetchData" :should-handle="!loading && !noMore" :threshold="1"></mugen-scroll>
    </div>
</template>

<script>
import CourseItem from './CourseItem'
import MugenScroll from 'vue-mugen-scroll'
import AOS from 'aos'
import 'aos/dist/aos.css'

export default {
    name: 'CourseList',
    components: {
        CourseItem,
        MugenScroll
    },
    data() {
        return {
            courses: [],
            search: '',
            loading: false,
            page: 1,
            noMore: false
        }
    },
    props: {
        numCourses: {
            type: Number,
            required: false
        },
        userId: {
            type: String,
            required: false
        },
        searchQueryString: {
            type: String,
            required: false
        },
        isRelatedCourses: {
            type: Boolean,
            required: false,
            default: false
        },
        currentCourse: {
            type: String,
            required: false,
        }
    },
    created() {
        AOS.init()

        this.search = this.searchQueryString

        if(this.isRelatedCourses) {
            this.fetchData()
        }


        window.Event.$on('searchValueChanged', (value) => {
            this.search = value
            this.courses = []
            this.page = 1
            this.fetchData()
        })
    },
    mounted() {

    },
    computed: {
        url() {
            return `http://127.0.0.1:8000/api/courses/recommended?page=${this.page}`
        }
    },
    methods: {
        fetchData() {
            this.loading = true
            axios.get('http://127.0.0.1:8000/api/courses/recommended', {
                params: {
                    num: this.numCourses ?? 6,
                    userid: this.userId ?? null,
                    search: this.search,
                    page: this.page,
                    currentcourse: this.currentCourse ?? null
                }
            })
                .then((response) => {
                    console.log(response)
                    if(response.data.data.length > 0) {
                        this.courses.push(...response.data.data)
                        this.loading = false
                        this.page++
                        this.noMore = false
                    } else {
                        this.noMore = true
                    }

                })
                .catch(e => {
                    console.log(e)
                });

        },
    }
}
</script>
