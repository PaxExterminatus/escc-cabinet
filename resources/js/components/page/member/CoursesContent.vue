<template>
    <div class="page-component">
        <CoursesTable :data="client.courses"/>
    </div>
</template>

<script>
import CoursesTable from 'cmp/data/courses/CoursesTable'

export default {
    components: {
        CoursesTable,
    },

    computed: {
        /**
         * @returns {ClientData}
         */
        client() {
            return this.$store.state.auth.client;
        },
    },
}
</script>
