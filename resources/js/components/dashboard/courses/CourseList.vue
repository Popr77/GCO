<template>
    <div>
        <div class="grid-container">
            <course-item
                v-for="course in courses.data"
                class="card mb-3"
                :id="course.id"
                :name="course.name"
                :category="course.subsubcategory"
                :description="course.description"
                :photo="course.photo"
                :price="course.price"
                :status="course.status"
                :updated_at="course.updated_at"
                :students="course.students"
                :key="course.id"
            ></course-item>
        </div>
        <pagination :align="'right'" :limit="3" :data="courses" @pagination-change-page="getResults"></pagination>

    </div>
</template>

<script>
import CourseItem from './CourseItem.vue'
import Pagination from 'laravel-vue-pagination'

export default {
    name: 'CourseList',
    components: {
        CourseItem,
        Pagination
    },
    data() {
        return {
            search: '',
            courses: {}
        }
    },
    computed: {
        filteredCourses() {
            return this.courses.data.filter(course => {
                return course.name.toLowerCase().includes(this.search.toLowerCase())
            })
        },
    },
    async created() {
        await this.getResults()
        this.$parent.$on('searchValueChanged', (search) => {
            this.search = search
            this.getResults()
        })
    },
    methods: {
        getResults(page = 1) {
            axios.get('/api/courses', {
                params: {
                    page: page,
                    search: this.search
                }
            })
                .then(response => {
                    this.courses = response.data;
                    console.log(this.courses)
                })
                .catch(e => {
                    console.log(e)
                });
        }
    }
}
</script>

<style scoped>
.grid-container {
    display: grid;
    grid-template-columns: 1fr;
    grid-row-gap: 10px;
    grid-column-gap: 20px;
}

@media (min-width: 576px) {

}

@media (min-width: 768px) {

}

@media (min-width: 992px) {
    .grid-container {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1200px) {
    .grid-container {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (min-width: 1400px) {
    .grid-container {
        grid-template-columns: repeat(4, 1fr);
    }
}
</style>
