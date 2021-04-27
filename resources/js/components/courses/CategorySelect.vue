<template>
    <div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="custom-select" id="category" @change="filterSubCategories($event.target.selectedIndex)" required>
                <option selected></option>
                <option v-for="(category, index) in categories"
                        :key="category.id"
                        value="category.id">{{ category.name }}</option>
            </select>
        </div>
        <div v-show="selectedCatIndex > -1" class="form-group">
            <label for="subcategory">Sub Category</label>
            <select id="subcategory" class="custom-select" @change="filterSubSubCategories($event.target.selectedIndex)" required>
                <option selected></option>
                <option v-for="subcategory in filteredSubCategories"
                        :key="subcategory.id"
                        :value="subcategory.id">{{ subcategory.name }}</option>
            </select>
        </div>

        <div v-show="selectedSubCatIndex > -1" class="form-group">
            <label for="subsubcategory">Sub Sub Category</label>
            <select name="sub_sub_category_id" id="subsubcategory" class="custom-select" required>
                <option selected></option>
                <option v-for="subsubcategory in filteredSubSubCategories"
                        :key="subsubcategory.id"
                        :value="subsubcategory.id">{{ subsubcategory.name }}</option>
            </select>
        </div>
        <span v-if="errormsg" class="invalid-feedback d-block" role="alert">
            <strong>{{ errormsg }}</strong>
        </span>
    </div>
</template>

<script>
export default {
    name: 'CategorySelect',
    props: {
        errormsg : {
            required: false,
            type: String
        }
    },
    data() {
        return {
            categories: [],
            selectedCatIndex: -1,
            selectedSubCatIndex: -1,
            selectedSubSubCatIndex: -1,
            name: '',
            description: '',
            goals: '',
            requirements: '',
            status: 0,
            duration: 0,
            price: '',
            photo: ''
        }
    },
    computed: {
        filteredSubCategories() {
            return this.categories[this.selectedCatIndex] === undefined ? [] : this.categories[this.selectedCatIndex].subcategories
        },
        filteredSubSubCategories() {
            return this.filteredSubCategories[this.selectedSubCatIndex] === undefined ? [] : this.filteredSubCategories[this.selectedSubCatIndex].subsubcategories
        }
    },
    created() {
        axios.get('http://127.0.0.1:8000/api/categories')
            .then(response => {
                this.categories = response.data.data
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
    },
    methods: {
        filterSubCategories(selectedCatIndex) {
            this.selectedCatIndex = selectedCatIndex - 1;
        },
        filterSubSubCategories(selectedSubCatIndex) {
            this.selectedSubCatIndex = selectedSubCatIndex - 1;
        },
    }
}
</script>
