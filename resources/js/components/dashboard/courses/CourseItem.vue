<template>
    <div class="shadow-sm grid-item card">
        <a :href="/courses/ + id">
            <h5 class="card-header">{{ name }}</h5>
        </a>

        <div class="position-relative">
            <img class="w-100" :src="assets + photo" alt="">
            <a :href="`/dashboard/courses/${id}/edit`"
               class="btn btn-secondary mr-2 mb-2 position-absolute shadow-sm"
               style="bottom: 0; right: 0;">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                     class="bi bi-pencil-square"
                     viewBox="0 0 16 16">
                    <path
                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd"
                          d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
            </a>
        </div>
        <div class="card-body">
            <p class="card-text">{{ description }}</p>
        </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Rating:
                <span>
                    <star-rating
                    v-model="students.feedback_avg"
                    :increment="0.1"
                    :read-only="true"
                    :star-size="20"
                    :inline="true"/>{{ `(${students.feedback_count})` }}
                </span>

            </li>
            <li class="list-group-item d-flex justify-content-between">
                # of Sales:
                <span>{{ students.count }}</span>
            </li>
        </ul>

        <div class="card-footer text-muted d-flex justify-content-between">
            <span>Last updated:</span>{{ formattedDate }}
        </div>
    </div>
</template>

<script>
import StarRating from 'vue-star-rating'

export default {
    name: 'CourseItem',
    components: {
        StarRating
    },
    data() {
        return {
            assets: '/storage/img/courses/',
        }
    },
    computed: {
        formattedDate() {
            return new Date(this.updated_at).toLocaleString("pt-PT");
        }
    },
    methods: {},
    props: {
        id: {
            type: Number,
            required: true
        },
        name: {
            type: String,
            required: true
        },
        description: {
            type: String,
            required: true
        },
        photo: {
            type: String,
            required: true
        },
        category: {
            type: Object,
            required: true
        },
        status: {
            type: Number,
            required: true
        },
        price: {
            type: Number,
            required: true
        },
        updated_at: {
            type: String,
            required: true
        },
        students: {
            type: Object,
            required: true
        }
    },
    created() {

    }
}
</script>

<style scoped>
h5 {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
</style>
