<template>
    <div class="grid-container">
        <course-item
            v-for="course in courses"
            class="card mb-3"
            :id="course.id"
            :name="course.name"
            :category="course.subsubcategory"
            :description="course.description"
            :photo="course.photo"
            :price="course.price"
            :status="course.status"
            :updated_at="course.updated_at"
            :key="course.id"
        >
        </course-item>
    </div>
</template>

<script>
    import CourseItem from './CourseItem.vue'
    export default {
        name: 'CourseList',
        components: {
            CourseItem
        },
        data() {
            return {
                courses: []
            }
        },
        created() {
            axios.get('http://127.0.0.1:8000/api/courses', {
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content').getValue
                }
            })
            .then(response => {
                this.courses = response.data.data
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })

            console.log(document.querySelector('meta[name="csrf-token"]'))
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
