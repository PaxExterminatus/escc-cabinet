<template>
    <div class="page-component">
        <template v-if="client">
            <CoursesTable :data="client.courses"/>
        </template>
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
