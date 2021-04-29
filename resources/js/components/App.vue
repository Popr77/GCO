<template>
    <div id="main">
        <div class="d-flex" id="wrapper">

            <!-- Sidebar -->
            <sidebar></sidebar>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">

                <navbar></navbar>

                <div class="container-fluid py-4 px-5">
                    <transition name="fade" mode="out-in">
                        <router-view></router-view>
                    </transition>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
    </div>
</template>

<script>
    import Sidebar from './Sidebar.vue'
    import Navbar from './Navbar.vue'

    export default {
        name: 'App',
        components: {
            'sidebar': Sidebar,
            'navbar': Navbar
        }
    }
</script>

<style>

</style>
