<template>
    <div class="">
        <div>
            <answers-list>
                <form method="post" ref="myform" :action="link" >
                    <input type="hidden" name="_token" :value="csrf">

                    <slot></slot>
                    <h3>{{currentQuestion.question}}</h3>
                    <div class="input-group-prepend d-flex flex-column col-6 mx-auto mb-5 mt-5">
                        <div class="input-group-text my-2" v-for="answer in currentQuestion.answers" :key="answer.id">
                            <input type="radio" name="options" ref="tempInput"
                                   class="answerCheckbox" :checked="optionSelected.indexOf(answer.id) > -1 "
                                   v-bind:id="answer.id" v-bind:value="answer.id" @click="selectedAnwser(answer.id)">
                            <label v-bind:for="answer.id"
                                   class="mb-0 ml-2">{{answer.answer}}</label>
                        </div>
                        <input name="questionInput" ref="questionInput" type="hidden" value="">
                        <input name="anwserInput" ref="anwserInput" type="hidden" value="">

                        <div class="d-initial container mt-4 mb-3 p-0">
                            <button v-if="index>0" class="btn btn-primary float-left" @click.prevent="previous">Previous</button>
                            <button v-if="index<questions.length-1" class="btn btn-primary float-right" @click.prevent="next">Next</button>
                            <button v-if="index==questions.length-1" type="submit"
                                    class="btn btn-primary float-right" @click.prevent="end">Finish</button>
                        </div>
                    </div>
                </form>
            </answers-list>
        </div>
    </div>
</template>
<script>

import AnswersList from './AnswersList.vue'

export default {
    name : 'questions-container',
    data(){
        return {
            currentQuestion : this.questions[0],
            index: 0,
            optionSelected: [],
            idQuestions: [],
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    props: {
        questions: {
            type: Array,
            required: true
        },
        link:{
            type: String,
            required: true
        }
    },
    components: {
        AnswersList
    },
    methods: {
        selectedAnwser(id){
            this.optionSelected[this.index]=id;
        },
        next() {
            if (this.optionSelected.length >= this.index+1){
                this.index++
                this.currentQuestion = this.questions[this.index]
            }
        },
        previous(){
            this.index--
            this.currentQuestion = this.questions[this.index]
        },
        end(){
            if (this.optionSelected.length >= this.index+1) {
                this.$refs.anwserInput.value = this.optionSelected.toString()

                this.questions.forEach(element => this.idQuestions.push(element.id))
                this.$refs.questionInput.value = this.idQuestions.toString()

                this.$refs.myform.submit()
            }
        }
    }
}
</script>

<style>
</style>
