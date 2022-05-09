<template>
    <template v-if="playing">
        <i class="btn pi pi-pause" @click="pause"/>
    </template>
    <template v-else>
        <i class="btn pi pi-play" @click="play" v-tooltip.left="'Играть'"/>
    </template>
</template>

<script>
export default {
    name: 'AudioPlayerPlayButton',

    props: {
        playing: {
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
