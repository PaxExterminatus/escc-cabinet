<template>
    <div class="video-player">
        <Toolbar>
            <template #start>
                <span class="video-player-title" v-tooltip.bottom="title">{{title}}</span>
            </template>

            <template #end>
                <i class="btn small pi pi-power-off" @click="close" v-tooltip.left="'Закрыть'"/>
            </template>
        </Toolbar>

        <template v-if="src">
            <video :src="src" autoplay controls></video>
        </template>
    </div>
</template>

<script>
import Toolbar from 'primevue/toolbar'

export default {
    name: 'VideoPlayer',

    components: {
        Toolbar,
    },

    computed: {
        src() {
            return this.$store.state.video.src;
        },
        title() {
            return this.$store.state.video.title;
        },
    },

    methods: {
        close() {
            this.$store.commit('video/hide');
        },
    },
}
</script>
