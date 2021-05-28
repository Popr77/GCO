<template>
    <button v-if="!buyNow" class="btn btn-primary shadow-sm" @click.stop="toggle">
        <i class="bi" :class="[ isAdded ? 'bi-cart-check-fill' : 'bi-cart-plus' ]"></i>
    </button>
    <a v-else href="/checkout" class="btn btn-primary shadow-sm" @click="buy">Buy Now</a>
</template>

<script>
export default {
    name: 'BuyCourseBtn',
    data() {
        return {

        }
    },
    props: {
        course: {
            type: Object,
            required: true
        },
        buyNow: {
            type: Boolean,
            required: false,
            default: false
        }
    },
    computed: {
        isAdded() {
            let index = this.$store.state.cart.findIndex(x => x.id === this.course.id)

            return index > -1
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
        },
        buy() {
            if (!this.isAdded) {
                this.$emit('added')
                this.$store.commit('addToCart', this.course)
            }
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
    display: flex;
    justify-content: center;
    align-items: center;
}
button i {
    font-size: 1.2rem;
}
</style>
