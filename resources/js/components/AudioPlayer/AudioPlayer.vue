<template>
    <Dialog header="Header" v-model:visible="display" >
        Content
    </Dialog>
</template>

<script>
import Dialog from 'primevue/dialog'

export default {
    name: 'AudioPlayer',
    components: {
        Dialog,
    },
    data() {
        return {
            display: false,
        }
    },
}
</script>
