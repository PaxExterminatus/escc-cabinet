<template>
    <div class="page-component">
        CourseContent
    </div>
</template>

<script>
import CoursesTable from 'cmp/dataView/courses/CoursesListView'

export default {
    components: {
        CoursesTable,
    },

    computed: {
        /** @returns {ClientData} */
        client() {
            return this.$store.state.auth.client;
        },
    },
}
</script>
