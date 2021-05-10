<template>
    <div>
        <form class="form-inline my-2 my-lg-0">
            <input @input="changed" v-model="searchValue" class="form-control rounded-pill" type="text" placeholder="Search">
        </form>
    </div>

</template>

<script>
    import debounce from 'lodash.debounce'

    export default {
        name: 'SearchBar',
        data() {
            return {
                searchValue: ''
            }
        },
        methods: {
            changed: debounce(function() {
                this.$emit('searchValueChanged', this.searchValue)
            }, 300)
        }
    }
</script>

<style>

</style>
