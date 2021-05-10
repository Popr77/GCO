<template>
    <div>
        <div class="form-group">
            <label for="category">Category</label>
            <select @click.stop class="custom-select w-100" id="category" name="category_id" v-model="selectedCat" @change="filterSubCategories($event.target.value)" :required="fieldsrequired">
                <option selected></option>
                <option v-for="(category, index) in categories"
                        :key="category.id"
                        :value="category.id">{{ category.name }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="subcategory">Sub Category</label>
            <select @click.stop id="subcategory" name="sub_category_id" class="custom-select w-100" v-model="selectedSubCat" @change="filterSubSubCategories($event.target.value)" :required="fieldsrequired">
                <option selected></option>
                <option v-for="(subcat, index) in filteredSubCategories"
                        :key="subcat.id"
                        :value="subcat.id">{{ subcat.name }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="subsubcategory">Sub Sub Category</label>
            <select @click.stop name="sub_sub_category_id" id="subsubcategory" v-model="selectedSubSubCat" class="custom-select w-100" :required="fieldsrequired">
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
        },
        fieldsrequired : {
            required: false,
            type: Boolean,
            default: true
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
            return this.categories[this.selectedCat - 1] === undefined ? []
                : this.categories[this.selectedCat - 1].subcategories
        },
        filteredSubSubCategories() {
            let index = this.findIndexById(this.filteredSubCategories, this.selectedSubCat)
            return this.filteredSubCategories[index] === undefined ? []
                : this.filteredSubCategories[index].subsubcategories
        }
    },
    methods: {
        filterSubCategories(id) {
            this.selectedSubCat = ''
            this.selectedSubSubCat = ''
            this.selectedCat = id
        },
        filterSubSubCategories(index) {
            this.selectedSubSubCat = ''
            this.selectedSubCat = index
        },
        findIndexById(arr, value) {
            return arr.findIndex((x) => x.id == value)
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
                    if (this.findIndexById(subcat.subsubcategories, this.subsubcat) >= 0) {
                        this.selectedCat = cat.id
                        this.selectedSubCat = subcat.id
                        this.selectedSubSubCat = this.subsubcat
                    }
                })
            })
        }
    }
}
</script>
