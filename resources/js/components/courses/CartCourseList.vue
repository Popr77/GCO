<template>
    <div>
        <div v-for="item in $store.state.cart"
             :key="item.id">
            <div class="d-flex row">
                <input type="hidden" name="courses[]" :value="item.id">
                <p class="col-8">{{ item.name }}</p>
                <p class="text-danger col-3">{{ (item.price / 100).toFixed(2) }}€</p>
                <button class="del-button rounded-circle" @click.stop="removeFromCart(item)">X</button>
            </div>
            <hr>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            csrf: ''
        }
    },
    props: {
        userId: {
            type: String,
            required: false
        }
    },
    computed: {
    },
    methods: {
        removeFromCart(item) {
            this.$emit('removed')
            this.$store.commit('removeFromCart', item)
        },
        getUserCourses() {
            axios.get('/api/courses/user-courses', {
                params: {
                    userid: this.userId ?? null
                }
            })
                .then(response => {
                    response.data.data.forEach((c) => {
                        let index = this.$store.state.cart.findIndex((x) => x.id === c.id)

                        if(index > -1) {
                            this.$store.state.cart.splice(index, 1)
                        }
                    })

                    this.$store.commit('saveCart')
                })
                .catch(e => {
                    console.log(e)
                });
        }
    },
    created() {
        if(this.userId) {
            this.getUserCourses()
        }
    }
}
</script>

<style scoped>
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


</style>
