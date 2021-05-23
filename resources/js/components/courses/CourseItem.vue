<template>
    <div class="col-sm-6 col-md-6 col-lg-4 py-2 d-flex flex-column position-relative">
        <a :href="course.url" class="shadow-sm">
            <div class="card-img-top rounded course-image"
                 :style="{ backgroundImage: 'url(' + assets + course.photo + ')' }">
            </div>
        </a>
        <button class="btn btn-primary shadow-sm" @click.stop="toggle">
            <i class="bi" :class="[ isAdded ? 'bi-cart-check-fill' : 'bi-cart-plus' ]"></i>
        </button>
        <a :href="course.url" class="mt-2 d-flex justify-content-start course-name"><p class="font-weight-bold">{{ course.name }}</p></a>
        <div class="d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-start align-items-center">
                <star-rating :increment="0.1"
                             :star-size="20"
                             read-only
                             :show-rating="false"
                             :inline="true"
                             class="mb-1"
                             :rating="course.students.feedback_avg"
                ></star-rating>
                <p class="text-dark mb-0">({{ course.students.feedback_count }})</p>
            </div>
            <div class="container-fluid pr-0">
                <p class="text-danger d-flex justify-content-end mb-0 font-weight-bold">{{ course.price / 100 }} €</p>
            </div>
        </div>
    </div>
</template>

<script>
import StarRating from 'vue-star-rating'

export default {
    name: 'CourseItem',
    components: {
        StarRating
    },
    props: {
        course: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            assets: '/storage/img/courses/',
        }
    },
    methods: {
        toggle() {
            if (this.isAdded) {
                this.$emit('removed')
                this.$store.commit('removeFromCart', this.course)
            } else {
                this.$emit('added')
                this.$store.commit('addToCart', this.course)

            }
        }
    },
    computed: {
        isAdded() {
            let index = this.$store.state.cart.findIndex(x => x.id === this.course.id)

            return index > -1
        }
    },
    created() {
        let index = this.$store.state.cart.findIndex(x => x.id === this.course.id)
        if (index > -1) {
            this.added = true
        }
    }
}
</script>

<style scoped>
button {

    position: absolute;
    bottom: 75px;
    right: 25px;
    display: flex;
    justify-content: center;
    align-items: center;
}

button i {
    font-size: 1.2rem;
}
</style>
