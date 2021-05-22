<template>
    <form class="p-4 shadow" method="POST" action="/checkout/submit" ref="checkoutform">
        <input type="hidden" name="_token" v-model="this.csrf">
        <cart-course-list/>
        <div class="d-flex justify-content-between align-items-center">
            <p>Total: <span class="text-danger font-weight-bold">{{ totalPrice }}€</span></p>
            <button type="submit" class="btn btn-primary" @click.prevent="checkout">Checkout</button>
        </div>
    </form>
</template>

<script>
import CartCourseList from "./CartCourseList";

export default {
    name: 'Checkout',
    components: {
        CartCourseList
    },
    data() {
        return {
            csrf: ''
        }
    },
    computed: {
        totalPrice() {
            let total = 0
            for(const course of this.$store.state.cart) {
                total += course.price / 100
            }

            return total.toFixed(2)
        }
    },
    methods: {
        checkout() {
            this.$refs.checkoutform.submit()
            this.$store.commit('clearCart')
        }
    },
    created() {
        this.csrf = document.querySelector('meta[name="csrf-token"]').content
    }
}
</script>
