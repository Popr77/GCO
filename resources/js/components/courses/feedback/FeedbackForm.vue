<template>
    <form :action="action" method="POST">
        <slot name="token"></slot>
        <div class="form-group">
            <label for="comment" class="text-light">Comment</label>
            <textarea class="form-control" name="feedback_comment" id="comment" rows="4"></textarea>
        </div>
        <div class="form-group d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <label for="stars" class="text-light mb-0">Rating</label>
                <input type="hidden" name="feedback_stars" v-model="stars">
                <star-rating :increment="1"
                             :star-size="20"
                             :show-rating="false"
                             :inline="true"
                             class="mb-1 ml-2"
                             id="stars"
                             @rating-selected="setRating"></star-rating>
            </div>
            <button type="submit" class="btn btn-light">Send</button>

        </div>
    </form>

</template>

<script>
import StarRating from 'vue-star-rating'
export default {
    name: 'FeedbackForm',
    components: {
        StarRating
    },
    data() {
        return {
            stars: 0
        }
    },
    props: {
        action: {
            type: String,
            required: true
        }
    },
    methods: {
        setRating(e) {
            this.stars = e
        }
    }
}
</script>

<style scoped>
textarea {
    resize: none;
}
</style>
