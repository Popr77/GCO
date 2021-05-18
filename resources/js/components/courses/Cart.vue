<template>
    <div class="cart">
        <div class="position-relative" data-toggle="dropdown">
            <i class="bi bi-cart-fill"></i>
            <span class="number-items shadow-sm">{{ $store.state.cart.length }}</span>
        </div>
        <form class="dropdown-menu p-4 shadow">
            <div class="form-group"
                 v-for="item in $store.state.cart"
                 :key="item.id">
                <div class="d-flex row">
                    <p class="col-8">{{ item.name }}</p>
                    <p class="text-danger col-3">{{ (item.price / 100).toFixed(2) }}€</p>
                    <button class="del-button rounded-circle">X</button>
                </div>
                <hr>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <p>Total: <span class="text-danger font-weight-bold">{{ totalPrice }}€</span></p>
                <button type="submit" class="btn btn-primary">Checkout</button>
            </div>
        </form>

    </div>
</template>

<script>
export default {
    name: 'Cart',
    data() {
        return {

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
    }
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

p {
    margin-bottom: 0;
}

.del-button {
    display: flex;
    justify-content: center;
    align-items: center;
    border: none;
    width: 25px;
    height: 25px;
}

.del-button:hover {
    background-color: #212121;
    color: #eee;
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
    top: 60px;
    left: 50%;
    margin-left: -45vw;
    width: 90vw;
}

@media (min-width: 768px) {
    .dropdown-menu {
        width: 70vw;
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
