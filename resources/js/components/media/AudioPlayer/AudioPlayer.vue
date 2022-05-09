<template>
    <div>
        <Toolbar class="player-buttons">
            <template #start>
                <AudioPlayerPlayButton @play="play" @pause="pause"/>
            </template>

            <template #end>
                <i class="btn-ico small pi pi-download" v-tooltip.left="'Скачать'"/>
                <i class="btn-ico small pi pi-window-minimize" @click="showCompactPlayer" v-tooltip.left="'Компактный'"/>
                <i class="btn-ico small pi pi-power-off" @click="closePlayer" v-tooltip.left="'Закрыть'"/>
            </template>
        </Toolbar>

        <audio ref="audio" autoplay controls style="vertical-align: middle" :src="audioSrc" type="audio/mp3"
               @timeupdate="onAudioTimeUpdate" @play="onPlay" @pause="onPause"
        />

        <List v-model="selected" :options="list" optionLabel="name" @change="onListChange">
            <template #option="slotProps">
                <div class="align-v-center-gap">
                    <i class="pi" :class="viewListIcon(slotProps.option.name)"/>
                    <div>{{slotProps.option.name}}</div>
                </div>
            </template>
        </List>
    </div>
</template>

<script>
import api from 'api'
import audioPlayer from './'
import List from 'primevue/listbox'
import Dialog from 'primevue/dialog'
import Toolbar from 'primevue/toolbar'
import AudioPlayerPlayButton from './AudioPlayerPlayButton'

export default {
    name: `AudioPlayer`,

    components: {
        List,
        Dialog,
        Toolbar,
        AudioPlayerPlayButton,
    },

    data() {
        return {
            selected: null,
            audioSrc: null,
        };
    },

    methods: {
        closePlayer() {
            this.playing = false;
            this.paused = true;
            this.audioSrc = null;
            this.displaySmall = false;
            this.display = false;

            audioPlayer.clear().hide();
        },

        play() {
            this.$refs.audio.play();
        },

        pause() {

        },

        /** @param {CurseAudio} value */
        onListChange({value}) {
            this.audioSrc = value.play_url;
        },

        onAudioTimeUpdate() {

        },

        viewListIcon(name)
        {
            return {
                'pi-play': this.selected?.name === name,
                'pi-file': this.selected?.name !== name
            };
        }
    },

    computed: {
        /** @returns {CurseAudio[]} */
        list() {
            return audioPlayer.list;
        },

        /** @returns {HTMLAudioElement} */
        audioHtmlElement() {
            return this.$refs.audio;
        },
    },
}
</script>
