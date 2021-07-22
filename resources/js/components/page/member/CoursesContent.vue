<template>
    <div class="page-component">
        <CoursesTable :data="courses"/>
    </div>
</template>

<script>
import CoursesTable from 'cmp/data/courses/CoursesTable'

export default {
    components: {
        CoursesTable,
    },

    computed: {
        courses() {
            return this.$store.state.client.courses;
        },
    },
}
</script>
