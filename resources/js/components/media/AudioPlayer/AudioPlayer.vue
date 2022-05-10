<template>
    <div class="audio-player">
        <div class="player-buttons">

            <div class="player-buttons-top">
                <a v-if="downloadUrl" :href="downloadUrl" class="btn">
                    <i class="btn small pi pi-download" v-tooltip.left="'Скачать Плейлист'"/>
                </a>

                <div class="flex-1"></div>

                <i class="btn small pi pi-window-minimize" @click="showCompactPlayer" v-tooltip.left="'Компактный'"/>
                <i class="btn small pi pi-power-off" @click="closePlayer" v-tooltip.left="'Закрыть'"/>
            </div>

            <div class="player-buttons-mid">
                <AudioPlayerPlayButton @play="play" @pause="pause"/>

                <div class="flex-1"></div>

                <div class="audio-player-volume">
                    <Slider v-model="volume" orientation="vertical"/>
                </div>
            </div>

            <div class="player-buttons-down">

                <div class="player-timeline">
                    <Slider v-model="currentTime" :max="duration" @slideend="onTimeSlideend" @change="onTimeChange"/>
                </div>

                <div class="player-times">
                    <div class="player-times-current">
                        {{currentTimeFormatted}}
                    </div>
                    <div class="player-times-duration">
                        {{durationFormatted}}
                    </div>
                </div>
            </div>
        </div>

        <audio ref="audio" autoplay controls style="vertical-align: middle" :src="audioSrc" type="audio/mp3"
               @timeupdate="onAudioTimeUpdate" @play="onPlay" @pause="onPause"
        />

        <ScrollPanel style="height: calc(100vh - (1rem * 12))" class="scroll-custom">
            <List v-model="selected" :options="list" optionLabel="name" @change="onListChange">
                <template #option="slotProps">
                    <div class="align-v-center-gap">
                        <i class="pi" :class="viewListIcon(slotProps.option.name)"/>
                        <div>{{slotProps.option.name}}</div>
                    </div>
                </template>
            </List>
        </ScrollPanel>
    </div>
</template>

<script>
import audioPlayer from './'
import List from 'primevue/listbox'
import Dialog from 'primevue/dialog'
import Toolbar from 'primevue/toolbar'
import Slider from 'primevue/slider'
import AudioPlayerPlayButton from './AudioPlayerPlayButton'
import ScrollPanel from 'primevue/scrollpanel'

export default {
    name: `AudioPlayer`,

    components: {
        List,
        Dialog,
        Toolbar,
        Slider,
        AudioPlayerPlayButton,
        ScrollPanel,
    },

    data() {
        return {
            selected: null,
            audioSrc: null,
            volumeState: 100,
            timeState: 100,
            durationFormatted: null,
            duration: 100,
            currentTimeState: 0,
            currentTimeFormatted: null,
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
            this.audioHtmlElement.play();
        },

        pause() {

        },

        /** @param {CurseAudio} value */
        onListChange({value}) {
            this.audioSrc = value.play_url;
        },

         /** @param {HTMLAudioElement} currentTarget */
        onAudioTimeUpdate({currentTarget}) {
            const {duration, currentTime} = currentTarget;

            if (this.duration !== duration) {
                this.duration = duration;
            }
            this.durationFormatted = this.timeFormat(duration);

            this.timeChange(currentTime);
        },

        onTimeSlideend({value})
        {
            this.audioHtmlElement.currentTime = value;
            this.audioHtmlElement.play();
        },

        onTimeChange(value) {
            this.audioHtmlElement.pause();
            this.audioHtmlElement.currentTime = value;
        },

        timeFormat(sec) {
            let sec_num = parseInt(sec, 10);
            let hours   = Math.floor(sec_num / 3600);
            let minutes = Math.floor((sec_num - (hours * 3600)) / 60);
            let seconds = sec_num - (hours * 3600) - (minutes * 60);

            if (hours  < 10) {hours   = "0"+hours;}
            if (minutes < 10) {minutes = "0"+minutes;}
            if (seconds < 10) {seconds = "0"+seconds;}
            return hours+':'+minutes+':'+seconds;
        },

        viewListIcon(name)
        {
            return {
                'pi-play': this.selected?.name === name,
                'pi-file': this.selected?.name !== name
            };
        },

        volumeChange(volume) {
            this.audioHtmlElement.volume = volume/100;
            this.volumeState = volume;
        },

        timeChange(time) {
            this.currentTimeFormatted = this.timeFormat(time);
            this.currentTimeState = time;
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

        /** @return {string} */
        downloadUrl() {
            return audioPlayer.downloadUrl;
        },

        volume: {
            get() {
                return this.volumeState;
            },
            set(volume) {
                this.volumeChange(volume);
            }
        },

        currentTime: {
            get() {
                return this.currentTimeState;
            },
            set(volume) {
                this.timeChange(volume);
            }
        },
    },
}
</script>
