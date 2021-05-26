<template>
    <div>
        <div v-show="flag" ref="errorAlert" class="alert alert-danger alert-dismissible fade container show text-center mt-4 mb-0" role="alert">
            <label class="my-0">There is a minimum of 5 questions.</label>
        </div>
        <form :action="link" method="post"  ref="formQA" class="col-6 mx-auto form-QA">
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="lessonID" :value="lessonId">
            <input type="hidden" name="_method" value="PUT">

            <div v-for="(question, i) in array" :key="i"  class="mb-5">
                <div v-if="question.id != null" class="form-group mt-5">
                    <label for="question">Question {{i+1}}</label>
                    <input type="text" class="form-control" required :id="'question' + i" :name="'question' +  i" aria-describedby="Question" :placeholder="'Question'" :value="question.question">
                </div>
                <div v-if="question.id == null" class="form-group mt-5">
                    <label for="question">Question {{i+1}}</label>
                    <input type="text" class="form-control" required :id="'question' + i" :name="'question' +  i" aria-describedby="Question" :placeholder="'Question'" value="">
                </div>
                <div v-for="(answer, index2) in question.answers" v-if="question.id != null" :key="index2" class="form-group mb-0 ml-3 ">
                    <label :for="'answer'+ i + '.' + index2">Answer {{i+1 + '.' + (index2+1)}}</label>
                    <input type="text" class="form-control" required :id="'answer'+ i + '.' + index2" :name="'answer'+ i + '.' + index2" :placeholder="'Answer'" :value="answer.answer">
                    <div class="text-right mt-2 mr-2">
                        <input type="radio" :id="'answer'+ i + index2" :checked="answer.is_correct" :name="'correct'+ i" :value="index2">
                        <label :for="'answer'+ i + index2"> Correct One</label>
                    </div>
                </div>
                <div v-for="(a,index2) in 4" v-if="question.id == null" :key="index2" class="form-group mb-0 ml-3 ">
                    <label :for="'answer'+ i + '.' + index2">Answer {{i+1 + '.' + (index2+1)}}</label>
                    <input type="text" class="form-control" required :id="'answer'+ i + '.' + index2" :name="'answer'+ i + '.' + index2" :placeholder="'Answer'" value="">
                    <div class="text-right mt-2 mr-2">
                        <input type="radio" :id="'answer'+ i + index2" :checked="index2==0" :name="'correct'+ i" :value="index2">
                        <label :for="'answer'+ i + index2"> Correct One</label>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mb-5 mt-5">
                <div class="ml-2">
                    <button type="button" ref="buttonAdd" class="btn btn-add" @click.prevent="addQuestion">Add</button>
                    <button type="button" class="btn btn-danger" @click.prevent="removeQuestion">Remove</button>
                </div>
                <div class="mr-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>

export default {
    name : 'create-questions',
    data(){
        return {
            array: this.questions.slice(),
            index: this.questions.length-1,
            flag: false,
            // questions: [1,2,3,4,5],
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    props: {
        lessonId:{
            type: String,
            required: true
        },
        link:{
            type: String,
            required: true
        },
        questions:{
            type: Array,
            required: true
        }
    },
    created() {
        console.log(this.questions)
        console.log(this.index)
    },
    methods: {
        addQuestion() {
            this.index++
            this.array.push(this.index)

            this.flag = false
            console.log(this.array)

            this.$refs.buttonAdd.scrollIntoView()

            if (this.$refs.buttonAlert){
                this.$refs.buttonAlert.click()
            }
        },
        removeQuestion(){
            if (this.index+1 >5){
                this.index--
                this.array.pop()
                console.log(this.array)

            }else{
                this.flag = true
                window.scroll(0,0);
            }

            if (this.$refs.buttonAlert){
                this.$refs.buttonAlert.click()
            }
            console.log(this.index)

        }
    }
}
</script>

<style>

.btn-add{
    background-color: gray;
    color: white;
    opacity: 0.85;
}

.btn-add:hover{
    color: white;
    opacity: 1;
}

</style>
