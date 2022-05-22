<template>
    <div class="player-buttons">
        <i class="btn pi pi-play" @click="play"/>
        <i class="btn pi pi-pause" @click="pause"/>
    </div>

    <div class="player-buttons">
        <i class="btn small pi pi-list" @click="full" v-tooltip.left="'Список'"/>
        <i class="btn small pi pi-power-off" @click="close" v-tooltip.left="'Закрыть'"/>
    </div>
</template>

<script>
import audioPlayer from './'

export default {
    name: 'AudioPlayerCompact',

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

