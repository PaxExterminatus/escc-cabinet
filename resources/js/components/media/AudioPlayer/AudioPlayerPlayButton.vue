<template>
    <template v-if="paused">
        <i class="btn pi pi-play" @click="play" v-tooltip.left="'Играть'"/>
    </template>

    <template v-if="!paused">
        <i class="btn pi pi-pause" @click="pause" v-tooltip.left="'Пауза'"/>
    </template>
</template>

<script>
export default {
    name: 'AudioPlayerPlayButton',

    props: {
        paused: {
            type: Boolean,
            default: false,
        },
    },

    methods: {
        play() {
            this.$emit('play');
        },

        pause() {
            this.$emit('pause');
        },
    },
}
</script>
