<template>
    <div class="page-component">
        <template v-if="client">
            <h1>{{course.name}}</h1>
        </template>

        <template v-for="lesson in lessons">
            <div>
                <h2>{{lesson.name}}</h2>
            </div>
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

    methods: {
        checkUser(callback) {
            if (!this.client) return null;
            return callback();
        }
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

        /** @returns {ClientCourseLesson[]|null} */
        lessons() {
            return this.checkUser(() => this.course.lessons)
        },
    },
}
</script>
