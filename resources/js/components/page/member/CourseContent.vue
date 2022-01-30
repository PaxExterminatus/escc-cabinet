<template>
    <div class="page-component">
        {{course}}
    </div>
</template>

<script>
export default {
    props: {
        course: {
            require: true,
        },
    },

    computed: {
        /** @returns {ClientData} */
        client() {
            return this.$store.state.auth.client;
        },
    },
}
</script>
