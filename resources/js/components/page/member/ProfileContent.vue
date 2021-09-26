<template>
    <div class="page-component page-profile">
        <h2>{{ client.name.full }}</h2>
    </div>
</template>

<script>
export default {
    computed: {
        /** @returns {AuthUserStore} */
        client() {
            return this.$store.state.auth.user;
        },
    },
}
</script>
