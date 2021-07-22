<template>
    <div id="app" class="application">
        <router-view/>
    </div>
</template>

<script>
export default {
    computed: {
        /** @returns {AuthUser} */
        user() {
            return this.$store.state.auth.user;
        },
    },
}
</script>
