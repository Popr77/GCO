<template>
    <div>
        <p v-if="filteredCourses.length === 0" class="text-center mt-5">No courses to show...</p>
        <div v-else class="grid-container">
            <course-item
                v-for="course in filteredCourses"
                class="card mb-3"
                :id="course.id"
                :name="course.name"
                :category="course.subsubcategory"
                :description="course.description"
                :photo="course.photo"
                :price="course.price"
                :status="course.status"
                :updated_at="course.updated_at"
                :deleted_at="course.deleted_at"
                :students="course.students"
                :key="course.id"
            ></course-item>
        </div>
        <pagination v-if="filteredCourses.length > 0" :align="'right'" :limit="3" :data="courses" @pagination-change-page="getResults"></pagination>

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
            isLoading: false,
            courses: {},
            showDeleted: false
        }
    },
    computed: {
        filteredCourses() {
            if(this.isLoading) {
                return []
            }

            return this.showDeleted ? this.courses.data.filter(x => x.deleted_at != undefined)
                : this.courses.data.filter(x => x.deleted_at == undefined)
        }
    },
    async created() {
        await this.getResults()
        window.Event.$on('searchValueChanged', (search) => {
            this.search = search
            this.getResults()
        })

        this.$parent.$on('toggleArchived', () => {
            this.showDeleted = !this.showDeleted
        })
    },
    methods: {
        getResults(page = 1) {
            this.isLoading = true
            axios.get('/api/courses', {
                params: {
                    page: page,
                    search: this.search,
                }
            })
                .then(response => {
                    this.courses = response.data;
                    console.log(this.courses)
                    this.isLoading = false
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
