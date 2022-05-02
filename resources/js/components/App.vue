<template>
    <div id="app" class="application">
        <router-view/>
        <AudioPlayer/>
        <VideoPlayerDialog/>
    </div>
</template>

<script>
import AudioPlayer from 'cmp/AudioPlayer/AudioPlayer'
import VideoPlayerDialog from 'cmp/VideoPlayer/VideoPlayerDialog'

export default {
    components: {
        AudioPlayer,
        VideoPlayerDialog,
    },
    computed: {
        /** @returns {AuthUser} */
        user() {
            return this.$store.state.auth.user;
        },
    },
}
</script>
