<template>
    <div id="app" class="application">
        {{user.name}}
        <div id="nav">
            <router-link :to="{name: 'signin'}">Sign in</router-link> |
        </div>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    computed: {
        user() {
            return this.$store.state.auth.user;
        },
    },
}
</script>
