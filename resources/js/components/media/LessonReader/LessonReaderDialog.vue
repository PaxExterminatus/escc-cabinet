<template>
    <Dialog
        class="lesson-reader"
        v-model:visible="visible"
        maximizable
        :header="title"
        position="left"
    >
        {{src}}
    </Dialog>
</template>

<script>
import Dialog from 'primevue/dialog'
import { reader } from './'

export default {
    name: 'LessonReaderDialog',
    components: {
        Dialog,
    },
    computed: {
        visible() {
            return reader.display;
        },
        title() {
            return reader.title;
        },
        src() {
            return reader.src;
        },
    },
}
</script>
