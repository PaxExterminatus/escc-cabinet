<template>
    <div id="app" class="application">
        <router-view/>
        <VideoPlayerDialog/>
        <AudioPlayerDialog/>
        <LessonReaderDialog/>
    </div>
</template>

<script>
import {VideoPlayerDialog} from 'cmp/media/VideoPlayer'
import {AudioPlayerDialog} from 'cmp/media/AudioPlayer'
import {LessonReaderDialog} from 'cmp/media/LessonReader'

export default {
    components: {
        VideoPlayerDialog,
        AudioPlayerDialog,
        LessonReaderDialog,
    },
    computed: {
        /** @returns {AuthUser} */
        user() {
            return this.$store.state.auth.user;
        },
    },
}
</script>
