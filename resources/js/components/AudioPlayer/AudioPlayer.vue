<template>
    <div class="audio-player">
        <!--Standard player-->
        <Dialog
            class="audio-player-dialog-list"
            position="topright"
            :header="title"
            v-model:visible="display"
            :showHeader="false"
            :style="{height: '100vh', maxHeight: 'calc(100% - 8px)', margin: '3px 0 3px 0'}"
        >
            <template #header>{{title}}</template>

            <Toolbar class="player-buttons">
                <template #start>
                    <template v-if="paused">
                        <i class="btn-ico pi pi-play" @click="play" v-tooltip.left="'Играть'"/>
                    </template>
                    <template v-if="playing">
                        <i class="btn-ico pi pi-pause" @click="pause"/>
                    </template>
                </template>

                <template #end>
                    <i class="btn-ico small pi pi-window-minimize" @click="showCompactPlayer" v-tooltip.left="'Компактный'"/>
                    <i class="btn-ico small pi pi-power-off" @click="closePlayer" v-tooltip.left="'Закрыть'"/>
                </template>
            </Toolbar>

            <List v-model="selected" :options="list" optionLabel="name" @change="select"/>
        </Dialog>

        <!--Small player-->
        <Dialog
            class="audio-player-dialog-small"
            position="topright"
            v-model:visible="displaySmall"
            :style="{height: '120px', width: '100px', margin: '55px 0 5px 0'}"
        >
            <div class="player-buttons">
                <template v-if="paused">
                    <i class="btn-ico pi pi-play" @click="play"/>
                </template>
                <template v-if="playing">
                    <i class="btn-ico pi pi-pause" @click="pause"/>
                </template>
            </div>

            <div class="player-buttons">
                <i class="btn-ico small pi pi-list" @click="showStandardPlayer" v-tooltip.left="'Список'"/>
                <i class="btn-ico small pi pi-power-off" @click="closePlayer" v-tooltip.left="'Закрыть'"/>
            </div>

            <template #header></template>
        </Dialog>

        <audio ref="audio" hidden autoplay style="vertical-align: middle" :src="audioSrc" type="audio/mp3"
            @timeupdate="onTimeupdate" @play="onPlay" @pause="onPause"
        />
    </div>
</template>

<script>
import api from 'api'
import List from 'primevue/listbox'
import Dialog from 'primevue/dialog'
import Toolbar from 'primevue/toolbar'

export default {
    name: 'AudioPlayer',
    components: {
        List,
        Dialog,
        Toolbar,
    },
    data() {
        return {
            selected: null,
            audioSrc: null,
            time: null,
            playing: false,
            paused: true,
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
        displaySmall() {
            return this.list.length && !this.display;
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
            if (!this.audioSrc) this.select({value: this.list[0]});
            this.$refs.audio.play();
        },
        showStandardPlayer() {
            this.displaySmall = false;
            this.display = true;
        },
        showCompactPlayer() {
            this.displaySmall = true;
            this.display = false;
        },
        closePlayer() {
            this.audioSrc = null;
            this.displaySmall = false;
            this.display = false;
            this.$store.commit('audio/setList', []);
            this.$store.commit('audio/hide');
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
