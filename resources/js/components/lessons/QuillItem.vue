<template>
    <div>
        <div id="editor">
            <quill-editor v-model="contentHtml">
            </quill-editor>
        </div>
    </div>
</template>

<script>
// import quill from "view-quill-editor"
// import AnswersList from "../quiz/AnswersList";
// // import {imageresize} from "../modules/imageresize.js"
// // quill.register ("modules/imageresize", imageresize)
//
// vue.use(quill)

export default {
    name : 'quill-item',
    data() {
        return {
            contentHtml: ''
        }
    }
    }
//     },components: {
//         quill
//     },
//     mounted() {
//         var quill = new Quill('#editor', {
//             modules: {
//                 toolbar: {
//                     container: '#toolbar',  // Selector for toolbar container
//                     handlers: {
//                         'bold': customBoldHandler
//                     }
//                 }
//             }
//         });
//     }
//
// }
</script>

<style>
</style>
