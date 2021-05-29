<template>
    <div class="cenas">
        <form class="my-2 my-lg-0 ml-lg-0" @submit.prevent ref="searchForm" :action="action">
            <div class="form-control rounded-pill w-100 w-md-50" id="search-input">
                <i class="bi bi-search"></i>
                <input @input="changed" v-model="searchValue"
                       @focusin="status"
                       @focusout="status"
                       class="border-0"
                       type="text"
                       name="search"
                       placeholder="Search"
                       autocomplete="off">
            </div>
            <search-bar-dropdown @moreResults="moreResults" v-if="hasDropdown"></search-bar-dropdown>
        </form>
    </div>

</template>

<script>
    import debounce from 'lodash.debounce'
    import SearchBarDropdown from "./SearchBarDropdown";

    export default {
        name: 'SearchBar',
        components: {
          SearchBarDropdown
        },
        data() {
            return {
                searchValue: '',
            }
        },
        props: {
            hasDropdown: {
                type: Boolean,
                required: false,
                default: false
            },
            action: {
                type: String,
                required: false
            },
            searchQueryString: {
                type: String,
                required: false
            }
        },
        methods: {
            changed: debounce(function() {
                window.Event.$emit('searchValueChanged', this.searchValue)
            }, 300),
            status() {
                setTimeout(() => {
                    this.$emit('statusChanged')
                }, 100)
            },
            moreResults() {
                this.$refs.searchForm.submit()
            }
        },
        created() {
            this.searchValue = this.searchQueryString ?? ''
        },
    }
</script>

<style scoped>
#search-input {
    display: flex;
    position: relative;
    z-index: 2;
}

#search-input i {
    position: relative;
    z-index: 3;
}

#search-input input {
    width: 100%;
    margin-left: 6px;
}

#search-input input:focus {
     outline: none;
}

form {
    position: relative;
}

</style>
