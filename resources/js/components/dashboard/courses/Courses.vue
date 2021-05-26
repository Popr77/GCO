<template>
    <div>
        <dashboard-header title="Courses">
            <a slot="left" href="/dashboard/courses/create" class="btn btn-primary ml-4">Add Course</a>
            <div slot="right" class="d-flex align-items-center">
                <div class="custom-control custom-switch custom-switch-lg mr-4">
                    <input type="checkbox" class="custom-control-input" id="customSwitch2" @click="toggleArchived">
                    <label class="custom-control-label" for="customSwitch2">
                        Show Archived
                    </label>
                </div>

                <form method="GET" action="#" id="filterByCategoryForm">
                    <div class="dropdown show mr-3">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filter By Category
                        </a>

                        <div class="dropdown-menu px-3" style="width: 300px;" aria-labelledby="dropdownMenuLink">
                            <category-select @categorychanged="search" :fieldsrequired="false"
                                             :is-filter="true"></category-select>
                            <button @click="search('')" type="reset" class="btn btn-primary" id="btn-filter">Reset</button>
                        </div>
                    </div>
                </form>

                <search-bar @searchValueChanged="search"></search-bar>
            </div>
        </dashboard-header>
        <course-list></course-list>
    </div>

</template>

<script>
import DashboardHeader from "../DashboardHeader";
import SearchBar from "../../SearchBar";
import CategorySelect from "./CategorySelect";
import CourseList from "./CourseList";

export default {
    name: 'Courses',
    components: {
        CourseList,
        DashboardHeader,
        SearchBar,
        CategorySelect
    },
    methods: {
        search(search) {
            this.$emit('searchValueChanged', search)
        },
        toggleArchived() {
            this.$emit('toggleArchived')
        }
    },
    created() {

    }
}

</script>

<style scoped>
.custom-switch.custom-switch-lg {
    /*padding-bottom: 1rem;*/
    padding-left: 2.25rem;
}
.custom-switch.custom-switch-lg .custom-control-label {
    padding-left: .75rem;
    padding-top: 0.15rem;
}
.custom-switch.custom-switch-lg .custom-control-label::before {
     border-radius: 1rem;
     height: 1.5rem;
     width: 2.5rem;
 }

.custom-switch.custom-switch-lg .custom-control-label::after {
     border-radius: .65rem;
     height: calc(1.5rem - 4px);
     width: calc(1.5rem - 4px);
 }

.custom-control-input:checked ~ .custom-control-label::after{
    transform: translateX(1rem);
}
</style>
