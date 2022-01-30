<template>
    <Dialog
        class="audio-player"
        position="topright"
        :header="title"
        v-model:visible="display"
        :style="{height: '100vh', maxHeight: 'calc(100% - 10px)', margin: '5px 0 5px 0'}"
    >
        <audio
            ref="audio"
            hidden
            autoplay
            style="vertical-align: middle"
            :src="audioSrc"
            type="audio/mp3"
            @timeupdate="timeupdate"
            @play="onPlay"
            @pause="onPause"
        />

        <div class="player-buttons">
            <template v-if="paused">
                <i class="btn-ico pi pi-play" @click="play"/>
            </template>
            <template v-if="playing">
                <i class="btn-ico pi pi-pause" @click="pause"/>
            </template>
        </div>

        <List v-model="selected" :options="list" optionLabel="name" @change="select"/>
    </Dialog>
</template>

<script>
import api from 'api'
import List from 'primevue/listbox'
import Dialog from 'primevue/dialog'

export default {
    name: 'AudioPlayer',
    components: {
        List,
        Dialog,
    },
    data() {
        return {
            selected: null,
            audioSrc: null,
            time: null,
            playing: false,
            paused: false,
        };
    },
    computed: {
        display: {
            get() {
                return this.$store.state.audio.show;
            },
            set() {
                this.$store.commit('audio/revers');
            }
        },
        list() {
            return this.$store.state.audio.list;
        },
        title() {
            return this.$store.state.audio.title;
        },
    },
    methods: {
        /** @param {{name: string, course: number, lesson: number, extension: string}} value */ // todo add TS interface
        select({value}) {
            this.audioSrc = api.audio.play(value);
        },
        play() {
            this.$refs.audio.play();
        },
        pause() {
            this.$refs.audio.pause();
        },
        /** @param {HTMLMediaElement} event */
        onTimeupdate(event) {
            console.log(event)
        },
        onPlay() {
            this.playing = true;
            this.paused = false;
        },
        onPause() {
            this.playing = false;
            this.paused = true;
        },
    },
}
</script>
