<template>
    <Dialog
        v-if="!compact"
        class="audio-player-dialog"
        v-model:visible="visible"
        :showHeader="false"
        position="topright"
        :style="{height: '100vh', maxHeight: 'calc(100vh - 10px)', margin: '5px 0 5px 0'}"
        style="overflow: visible !important;"
    >
        <AudioPlayer :audio="audio" :current-time="currentTime" :duration-time="durationTime"/>
    </Dialog>

    <Dialog
        v-if="compact"
        class="audio-player-dialog-small"
        position="topright"
        v-model:visible="visible"
        :style="{height: '120px', width: '100px', margin: '55px 0 5px 0'}"
    >
        <AudioPlayerCompact/>
    </Dialog>

    <audio ref="audio" hidden autoplay controls :src="src" type="audio/mp3"
           @timeupdate="onAudioTimeUpdate"
           @play="onAudioPlay"
           @ended="onAudioEnded"
    />
</template>

<script>
import audioPlayer from './'
import Dialog from 'primevue/dialog'
import AudioPlayer from './AudioPlayer'
import AudioPlayerCompact from './AudioPlayerCompact'

export default {
    name: 'AudioPlayerDialog',

    components: {
        Dialog,
        AudioPlayer,
        AudioPlayerCompact,
    },

    data() {
        return {
            currentTime: 0,
            durationTime: 0,
        };
    },

    computed: {
        visible() {
            return audioPlayer.display;
        },
        compact() {
            return audioPlayer.compactState;
        },
        /** @returns {HTMLAudioElement} */
        audio() {
            return this.$refs.audio;
        },
        /** @return {string|null} */
        src() {
            return audioPlayer.src;
        },
    },

    watch: {
        '$store.state.audio.paused': {
            immediate: true,
            handler(paused) {
                if (this.$refs.audio)
                {
                    if (paused) this.$refs.audio.pause();
                    else this.$refs.audio.play();
                }
            },
        },

        '$store.state.audio.src': {
            immediate: true,
            handler(src) {
                if (this.$refs.audio && src)
                {
                    this.$refs.audio.src = src;
                }
            },
        },
    },

    methods: {
        /** @param {HTMLAudioElement} currentTarget */
        onAudioTimeUpdate({currentTarget}) {
            const {duration, currentTime} = currentTarget;

            if (this.durationTime !== duration) {
                this.durationTime = duration;
            }

            this.currentTime = currentTime;
        },

        onAudioPlay() {
            audioPlayer.play();
        },

        onAudioEnded() {
            audioPlayer.pause();
            audioPlayer.playNext();
        },
    },
}
</script>
