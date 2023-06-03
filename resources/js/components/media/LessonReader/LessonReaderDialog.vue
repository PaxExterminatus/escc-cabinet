<template>
    <Dialog class="lesson-reader" v-model:visible="visible" maximizable header="Reader" position="left">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
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
    },
}
</script>
