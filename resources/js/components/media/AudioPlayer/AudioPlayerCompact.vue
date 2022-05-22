<template>
    <div class="player-buttons">
        <AudioPlayerPlayButton/>
    </div>

    <div class="player-buttons">
        <i class="btn small pi pi-list" @click="full" v-tooltip.left="'Список'"/>
        <i class="btn small pi pi-power-off" @click="close" v-tooltip.left="'Закрыть'"/>
    </div>
</template>

<script>
import audioPlayer from './'
import AudioPlayerPlayButton from './AudioPlayerPlayButton'

export default {
    name: 'AudioPlayerCompact',

    components: {
        AudioPlayerPlayButton,
    },

    props: {
        paused: {
            type: Boolean,
            default: true,
        },
    },

    methods: {
        close() {
            audioPlayer.clear().hide();
        },
        full() {
            audioPlayer.compact(false);
        },
    },
}
</script>

