<template>
    <div :class="{ 'd-block' : search.length > 0 && isActive }"
         id="search-dropdown"
         class="shadow overflow-hidden"
    >
        <div v-if="isLoading" class="d-flex justify-content-center mt-2">
            <div class="spinner-border text-primary mx-auto" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div v-for="course in courses"
             :key="course.id"
             class="d-flex flex-column justify-content-center py-2 course-item">
            <a :href="'/courses/' + course.id">
                <div class="d-flex align-items-center px-2">
                    <div :style="{ backgroundImage: 'url(' + assets + course.photo + ')' }"
                         class="course-image mr-2"></div>
                    <div class="d-flex flex-column justify-content-center">
                        <span>{{ course.name }}</span>
                        <span class="text-danger cat-name">{{ course.subsubcategory.name }}</span>
                    </div>
                </div>
            </a>
        </div>
        <a class="text-center more-results" @click="moreResults">
            <div class="py-3">More results</div>
        </a>
    </div>
</template>

<script>

export default {
    name: 'SearchBarDropdown',
    props: {
        userId: {
            type: String,
            required: false
        }
    },
    data() {
        return {
            isActive: false,
            search: '',
            courses: [],
            assets: '/storage/img/courses/',
            isLoading: true
        }
    },
    created() {
        window.Event.$on('searchValueChanged', (value) => {
            this.search = value
            this.getResults()
        })

        this.$parent.$on('statusChanged', () => {
            this.isActive = !this.isActive
        })
    },
    methods: {
        getResults() {
            this.isLoading = true
            axios.get('/api/courses/recommended', {
                params: {
                    page: 1,
                    search: this.search,
                    userid: this.userId ?? null,
                    num: 6
                }
            })
                .then(response => {
                    this.courses = response.data.data;
                    console.log(this.courses)
                    this.isLoading = false
                })
                .catch(e => {
                    console.log(e)
                });
        },
        moreResults() {
            this.$emit('moreResults')
        }
    }
}
</script>

<style scoped>
#search-dropdown {
    display: none;
    z-index: 1;
    background-color: var(--white);
    position: absolute;
    top: 50px;
    left: -1%;
    width: 102%;
    border-radius: 5px;
}

#search-dropdown a {
    color: var(--dark);
    text-decoration: none;
}

.cat-name {
    font-size: 0.8rem;
}

.course-image {
    width: 40px;
    height: 40px;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
}

.more-results {
    cursor: pointer;
}

.course-item:hover {
    background-color: var(--primary);
}

.course-item:hover a span {
    color: var(--light);
}

@media only screen and (min-width: 600px) {
}


@media only screen and (min-width: 768px) {
    #search-dropdown {
        width: 140%;
        left: -20%;
    }
}


@media only screen and (min-width: 992px) {
    #search-dropdown {
        width: 160%;
        left: -30%;
    }
}


@media only screen and (min-width: 1200px) {
}

</style>
