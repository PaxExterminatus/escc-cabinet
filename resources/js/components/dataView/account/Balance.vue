<template>
    <span class="balance">
        {{ client.total_deb }}
    </span>
</template>

<script>
export default {
    computed: {
        /** @returns {ClientData} */
        client() {
            return this.$store.state.auth.client;
        },
    },
}
</script>
