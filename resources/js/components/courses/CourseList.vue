<template>
    <div class="grid-container mt-2">
        <div v-for="course in courses" class="card mb-3 grid-item">
            <h3 class="card-header">Card header</h3>

            <svg xmlns="http://www.w3.org/2000/svg" class="d-block user-select-none" width="100%" height="200" aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">
                <rect width="100%" height="100%" fill="#868e96"></rect>
                <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
            </svg>
            <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
            <div class="card-body">
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
            <div class="card-footer text-muted">
                2 days ago
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'CourseList',
        data() {
            return {
                courses: [1,2,3,4,5]
            }
        },
        created() {

        }
    }
</script>

<style>
    .grid-container {
        display: grid;
        grid-template-columns: 1fr;
        grid-gap: 10px;
    }

    @media (min-width: 576px) {

    }

    @media (min-width: 768px) {

    }

    @media (min-width: 992px) {
        .grid-container {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (min-width: 1200px) {
        .grid-container {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (min-width: 1400px) {
        .grid-container {
            grid-template-columns: repeat(4, 1fr);
        }
    }
</style>
