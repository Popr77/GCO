<template>
    <div class="cart">
        <div class="position-relative" data-toggle="dropdown">
            <i class="bi bi-cart-fill"></i>
            <span class="number-items shadow-sm">{{ $store.state.cart.length }}</span>
        </div>
        <div class="dropdown-menu p-4 shadow">
            <cart-course-list v-if="!cartIsEmpty" :user-id="userId" />
            <p v-else>The cart is empty...</p>
            <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0">Total: <span class="text-danger font-weight-bold">{{ totalPrice }}€</span></p>
                <a href="/checkout" :disabled="cartIsEmpty" :class="{ 'disabled' : cartIsEmpty }" class="btn btn-primary">Checkout</a>
            </div>
        </div>
    </div>
</template>

<script>
import CartCourseList from './CartCourseList'

export default {
    name: 'Cart',
    components: {
      CartCourseList
    },
    data() {
        return {

        }
    },
    props: {
        userId: {
            type: String,
            required: false
        }
    },
    computed: {
        totalPrice() {
            let total = 0
            for(const course of this.$store.state.cart) {
                total += course.price / 100
            }

            return total.toFixed(2)
        },
        cartIsEmpty() {
            return this.$store.state.cart.length < 1;
        }
    },

}
</script>

<style scoped>
.cart {
    z-index: 9999;
}

div {
    cursor: pointer;
}

div i {
    font-size: 1.5rem;
}

.number-items {
    background-color: #325d88;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    position: absolute;
    left: 15px;
    text-align: center;
    color: white;
    font-weight: bold;
}

.dropdown-menu {
    position: fixed;
    top: 50px;
    left: 50%;
    margin-left: -45vw;
    width: 90vw;
}

@media (min-width: 768px) {
    .dropdown-menu {
        width: 70vw;
        top:60px;
        left: auto;
        right: 20px;
    }

}

@media (min-width: 992px) {
    .dropdown-menu {
        width: 50vw;
    }
}

@media (min-width: 1200px) {
    .dropdown-menu {
        width: 35vw;
    }
}

@media (min-width: 1600px) {
    .dropdown-menu {
        width: 25vw;
    }
}
</style>
