let cart = window.localStorage.getItem('cart')

export default {
    state: {
        cart: cart ? JSON.parse(cart) : [],
    },

    mutations: {
        addToCart(state, course) {
            state.cart.push(course)

            this.commit('saveCart')

        },
        removeFromCart(state, course) {
            let index = state.cart.findIndex(x => x.id === course.id)

            if(index > -1) {
                state.cart.splice(index, 1)
            }

            this.commit('saveCart')
        },
        saveCart(state) {
            window.localStorage.setItem('cart', JSON.stringify(state.cart))
        },
        clearCart(state) {
            state.cart = []
        }
    }
}
