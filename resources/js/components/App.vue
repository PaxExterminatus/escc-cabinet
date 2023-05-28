<template>
    <div id="app" class="application">
        {{reader}}
        <router-view/>
        <VideoPlayerDialog/>
        <AudioPlayerDialog/>
        <LessonReaderDialog/>
    </div>
</template>

<script>
import VideoPlayerDialog from 'cmp/VideoPlayer/VideoPlayerDialog'
import { AudioPlayerDialog } from 'cmp/media/AudioPlayer'
import { LessonReaderDialog, reader } from 'cmp/media/LessonReader'

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
        reader() {
            return reader.display;
        }
    },
}
</script>
