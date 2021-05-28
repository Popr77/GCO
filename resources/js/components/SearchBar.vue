<template>
    <div>
        <form class="my-2 my-lg-0 ml-lg-0">
            <div class="form-control rounded-pill w-100 w-md-50" id="search-input">
                <i class="bi bi-search"></i>
                <input @input="changed" v-model="searchValue" class="border-0" type="text" placeholder="Search">
            </div>
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
                console.log('emit')
                window.Event.$emit('searchValueChanged', this.searchValue)
            }, 300)
        }
    }
</script>

<style scoped>
#search-input {
    display: flex;
}

#search-input i {
    position: relative;
    z-index: 2;
}

#search-input input {
    width: 100%;
    margin-left: 6px;
}

#search-input input:focus {
     outline: none;
}
</style>
