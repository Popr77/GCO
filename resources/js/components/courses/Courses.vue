<template>
    <div>
        <dashboard-header title="Courses">
            <a slot="left" href="/dashboard/courses/create" class="btn btn-primary ml-4">Add Course</a>
            <div slot="right" class="d-flex">
                <form method="GET" action="#">
                    <div class="dropdown show mr-3">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Filter By Category
                        </a>

                        <div class="dropdown-menu px-3" style="width: 300px;" aria-labelledby="dropdownMenuLink">
                            <category-select @categorychanged="search" :fieldsrequired="false"
                                             :is-filter="true"></category-select>
                            <button type="submit" class="btn btn-primary" id="btn-filter">Filter</button>
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
import SearchBar from "../SearchBar";
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
        }
    },
    created() {

    }
}

</script>
