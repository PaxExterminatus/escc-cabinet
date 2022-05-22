<template>
    <Dialog
        class="audio-player-dialog"
        v-model:visible="visible"
        :showHeader="false"
        position="topright"
        :style="{height: '100vh', maxHeight: 'calc(100vh - 10px)', margin: '5px 0 5px 0'}"
        style="overflow: visible !important;"
    >
        <AudioPlayer/>
    </Dialog>
</template>

<script>
import audio from './'
import Dialog from 'primevue/dialog'
import AudioPlayer from './AudioPlayer'

export default {
    name: 'AudioPlayerDialog',

    components: {
        Dialog,
        AudioPlayer,
    },

    computed: {
        visible() {
            return audio.display;
        },
    },
}
</script>
