<template>
    <div id="app" class="application">
        <router-view/>
        <VideoPlayerDialog/>
        <AudioPlayerDialog/>
    </div>
</template>

<script>
import VideoPlayerDialog from 'cmp/VideoPlayer/VideoPlayerDialog'
import { AudioPlayerDialog } from 'cmp/media/AudioPlayer'

export default {
    components: {
        VideoPlayerDialog,
        AudioPlayerDialog,
    },
    computed: {
        /** @returns {AuthUser} */
        user() {
            return this.$store.state.auth.user;
        },
    },
}
</script>
