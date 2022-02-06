<template>
    <div class="page-component">
        <template v-if="client">
            <h1>{{course.name}}</h1>
            <div style="margin-bottom: 5px">
                <CourseMaterials :course="course"/>
            </div>
        </template>

       <template v-if="lessons">
           <LessonsListView :lessons="lessons" :course="course"/>
       </template>
    </div>
</template>

<script>
import LessonsListView from 'cmp/dataView/lessons/LessonsListView/LessonsListView'
import CourseMaterials from  'cmp/dataView/courses/CourseMaterials/CourseMaterials'

export default {
    components: {
        LessonsListView,
        CourseMaterials,
    },

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

        /** @returns {CourseData} */
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
