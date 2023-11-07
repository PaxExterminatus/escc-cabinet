<template>
    <Dialog
        class="video-player-dialog"
        v-model:visible="visible"
        :showHeader="false"
        position="top"
        :style="{marginTop: '55px'}"
    >
        <VideoPlayer/>
    </Dialog>
</template>

<script>
import Dialog from 'primevue/dialog'
import VideoPlayer from './VideoPlayer'

export default {
    name: 'VideoPlayerDialog',

    components: {
        Dialog,
        VideoPlayer,
    },

    computed: {
        visible() {
            return this.$store.state.video.show;
        },
    },
}
</script>
