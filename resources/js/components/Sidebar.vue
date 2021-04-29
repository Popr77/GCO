<template>
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">GCO</div>
        <div class="list-group list-group-flush">
            <router-link
                active-class="active"
                exact :to="{ name: 'home' }"
                class="list-group-item list-group-item-action bg-light nav-link">Dashboard</router-link>

            <router-link
                active-class="active"
                exact :to="{ name: 'courses' }"
                class="list-group-item list-group-item-action bg-light nav-link">Courses</router-link>

        </div>
    </div>
</template>

<script>

</script>

<style scoped>


</style>
