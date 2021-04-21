<template>
    <div class="shadow-sm">
        <h5 class="card-header">{{ name }}</h5>

        <svg xmlns="http://www.w3.org/2000/svg" class="d-block user-select-none" width="100%" height="200" aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">
            <rect width="100%" height="100%" fill="#868e96"></rect>
            <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
        </svg>
        <div class="card-body">
            <p class="card-text">{{ description }}</p>
        </div>
<!--        <ul class="list-group list-group-flush">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>-->
        <div class="card-body">
            <a href="#" class="card-link">Card link</a>
            <a href="#" class="card-link">Another link</a>
        </div>
        <div class="card-footer text-muted d-flex justify-content-between">
            <span>Last updated:</span>{{ formattedDate }}
        </div>
    </div>
</template>

<script>
    export default {
        name: 'CourseItem',
        data() {
            return {

            }
        },
        computed: {
            formattedDate() {
                return new Date(this.updated_at).toLocaleString("pt-PT");
            }
        },
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
            }
        }
    }
</script>
