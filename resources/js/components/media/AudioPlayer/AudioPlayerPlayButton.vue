<template>
    <template v-if="paused">
        <i class="btn pi pi-play" @click="play" v-tooltip.left="'Играть'"/>
    </template>

    <template v-if="!paused">
        <i class="btn pi pi-pause" @click="pause" v-tooltip.left="'Пауза'"/>
    </template>
</template>

<script>
import audioPlayer from './'

export default {
    name: 'AudioPlayerPlayButton',

    methods: {
        play() {
            audioPlayer.play();
        },

        pause() {
            audioPlayer.pause();
        },
    },

    computed: {
        paused() {
            return audioPlayer.paused;
        },
    },
}
</script>
