<template>
    <div class="page-component">
        <template v-if="client">
            <h1>{{course.name}}</h1>
        </template>
    </div>
</template>

<script>
export default {
    props: {
        courseId: {
            require: true,
            type: String,
        },
    },

    computed: {
        /** @returns {number} */
        courseIdCast() {
            return Number.parseInt(this.courseId);
        },

        /** @returns {ClientData} */
        client() {
            return this.$store.state.auth.client;
        },

        /** @returns {ClientCourse} */
        course() {
            return this.client.courses
                .find(course => {
                    if (course.node_id === this.courseIdCast) return course;
                });
        },
    },
}
</script>
