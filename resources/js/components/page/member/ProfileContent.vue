<template>
    <div class="page-component page-profile">
        <h2>{{ client.name.full }}</h2>
    </div>
</template>

<script>
export default {
    computed: {
        /** @returns {ClientStore} */
        client() {
            return this.$store.state.client;
        },
    },
}
</script>
