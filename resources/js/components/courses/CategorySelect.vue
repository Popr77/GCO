<template>
    <div>
        <div class="form-group">
            <label for="category">Category</label>
            <select @click.stop class="custom-select w-100" id="category" v-model="selectedCat" @change="filterSubCategories($event.target.value)" required>
                <option selected></option>
                <option v-for="(category, index) in categories"
                        :key="category.id"
                        :value="index">{{ category.name }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="subcategory">Sub Category</label>
            <select @click.stop id="subcategory" class="custom-select w-100" v-model="selectedSubCat" @change="filterSubSubCategories($event.target.value)" required>
                <option selected></option>
                <option v-for="(subcat, index) in filteredSubCategories"
                        :key="subcat.id"
                        :value="index">{{ subcat.name }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="subsubcategory">Sub Sub Category</label>
            <select @click.stop name="sub_sub_category_id" id="subsubcategory" v-model="selectedSubSubCat" class="custom-select w-100" required>
                <option selected></option>
                <option v-for="subsubcat in filteredSubSubCategories"
                        :key="subsubcat.id"
                        :value="subsubcat.id">{{ subsubcat.name }}</option>
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
        },
        subsubcat : {
            required: false,
            type: Number
        }
    },
    data() {
        return {
            categories: [],
            selectedCat: '',
            selectedSubCat: '',
            selectedSubSubCat: ''
        }
    },
    computed: {
        filteredSubCategories() {
            return this.categories[this.selectedCat] === undefined ? [] : this.categories[this.selectedCat].subcategories
        },
        filteredSubSubCategories() {
            return this.filteredSubCategories[this.selectedSubCat] === undefined ? [] : this.filteredSubCategories[this.selectedSubCat].subsubcategories
        }
    },
    methods: {
        filterSubCategories(index) {
            this.selectedSubCat = ''
            this.selectedSubSubCat = ''
            this.selectedCat = index
        },
        filterSubSubCategories(index) {
            this.selectedSubSubCat = ''
            this.selectedSubCat = index
        }
    },
    async created() {
        await axios.get('http://127.0.0.1:8000/api/categories')
            .then(response => {
                this.categories = response.data.data
            })
            .catch(function (error) {
                console.log(error);
            })

        if(this.subsubcat) {
            this.categories.forEach((cat, catindex) => {
                cat.subcategories.forEach((subcat, subcatindex) => {
                    if (subcat.subsubcategories.findIndex((x) => x.id === this.subsubcat) >= 0) {
                        this.selectedCat = catindex
                        this.selectedSubCat = subcatindex
                        this.selectedSubSubCat = this.subsubcat
                    }
                })
            })
        }
    }
}
</script>
