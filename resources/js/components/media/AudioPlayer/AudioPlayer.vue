<template>
    <div class="audio-player">
        <div class="player-buttons">

            <div class="player-buttons-top">
                <a v-if="downloadUrl" :href="downloadUrl" class="btn">
                    <i class="btn small pi pi-download" v-tooltip.left="'Скачать Плейлист'"/>
                </a>

                <div class="flex-1"></div>

                <i class="btn small pi pi-window-minimize" @click="playerCompact" v-tooltip.left="'Компактный'"/>
                <i class="btn small pi pi-power-off" @click="closePlayer" v-tooltip.left="'Закрыть'"/>
            </div>

            <div class="player-buttons-mid">
                <AudioPlayerPlayButton/>

                <div class="flex-1"></div>

                <div class="audio-player-volume">
                    <Slider v-model="volume" orientation="vertical"/>
                </div>
            </div>

            <div class="player-buttons-down">

                <div class="player-timeline">
                    <Slider v-bind="currentTime" :max="durationTime" @slideend="onTimeSlideend" @change="onTimeChange"/>
                </div>

                <div class="player-times">
                    <div class="player-times-current">
                        {{currentTimeFormatted}}
                    </div>
                    <div class="player-times-duration">
                        {{durationTimeFormatted}}
                    </div>
                </div>
            </div>
        </div>

        <div class="player-list" ref="list">
            <ScrollPanel style="height: calc(100vh - 200px)" class="scroll-custom">
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

    props: {
        audio: {},
        currentTime: {
            type: Number,
            default: 0,
        },
        durationTime: {
            type: Number,
            default: 0,
        },
    },

    data() {
        return {
            selected: null,
            volumeState: 100,
            timeState: 100,
            currentTimeState: 0,
        };
    },

    methods: {
        playerCompact() {
            audioPlayer.compact();
        },

        closePlayer() {
            audioPlayer.turnoff();
        },

        /** @param {CurseAudio} value */
        onListChange({value}) {
            audioPlayer.setSrc({src: value.play_url, title: value.name});
            audioPlayer.setSelected(value, 0);
        },

        onTimeSlideend({value})
        {
            this.audioElement.currentTime = value;
            this.audioElement.play();
        },

        onTimeChange(value) {
            this.audioElement.currentTime = value;
            this.audioElement.play();
        },

        timeFormat(sec) {
            if (!sec) return null
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
            this.audioElement.volume = volume/100;
            this.volumeState = volume;
        },

        timeChange(time) {
            this.currentTimeFormatted = this.timeFormat(time);
            this.currentTimeState = time;
        }
    },

    watch: {
        '$store.state.audio.selected': {
            immediate: true,
            handler(lesson) {
                this.selected = lesson;
            },
        },

    },

    computed: {
        /** @return {HTMLAudioElement} */
        audioElement() {
            return this.audio;
        },

        durationTimeFormatted() {
            return this.timeFormat(this.durationTime);
        },

        currentTimeFormatted() {
            return this.timeFormat(this.currentTime);
        },

        /** @returns {CurseAudio[]} */
        list() {
            return audioPlayer.list;
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
    },
}
</script>
