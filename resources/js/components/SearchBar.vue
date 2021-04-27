<template>
    <div>
        <form class="form-inline my-2 my-lg-0">
            <input @keyup="changed" v-model="searchValue" class="form-control rounded-pill" type="text" placeholder="Search">
        </form>
    </div>

</template>

<script>
    export default {
        name: 'SearchBar',
        data() {
            return {
                searchValue: ''
            }
        },
        methods: {
            changed() {
                this.$emit('searchValueChanged')
            }
        }
    }
</script>

<style>

</style>
