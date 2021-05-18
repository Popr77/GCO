<template>
    <div class="row d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex align-items-center">
            <h1>{{ title }}</h1>
            <slot name="left"></slot>
        </div>
        <slot name="right"></slot>
    </div>
</template>

<script>
import SearchBar from '../SearchBar.vue';
import CategorySelect from './courses/CategorySelect.vue';

export default {
    name: 'DashboardHeader',
    components: {
        SearchBar,
        CategorySelect
    },
    props: {
        title: {
            required: true,
            type: String
        }
    }
}
</script>
