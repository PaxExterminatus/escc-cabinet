<template>
    <div id="app" class="application">
        <router-view/>
        <AudioPlayer/>
    </div>
</template>

<script>
import AudioPlayer from 'cmp/AudioPlayer/AudioPlayer'

export default {
    components: {
        AudioPlayer,
    },
    computed: {
        /** @returns {AuthUser} */
        user() {
            return this.$store.state.auth.user;
        },
    },
}
</script>
