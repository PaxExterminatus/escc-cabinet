<template>
    <div class="page-component">
        <template v-if="client">
            <h1>{{course.name}}</h1>

            <template v-if="course.videoCategory">
                <Panel class="mt-2">
                    <template #header>
                        <h2 class="align-v-center-gap">
                            <i class="pi pi-video"/> Видео
                        </h2>
                    </template>
                    Content
                </Panel>
            </template>
        </template>

       <template v-if="lessons">
           <Panel class="panel-with-table">
               <template #header>
                   <h2 class="align-v-center-gap">
                       <i class="pi pi-book"/> Уроки
                   </h2>
               </template>

                <LessonsListView :lessons="lessons" :course="course"/>
           </Panel>
       </template>

        <template v-if="client">
            <div class="mt-2" style="margin-bottom: 5px">
                <CourseMaterials :course="course"/>
            </div>
        </template>
    </div>
</template>

<script>
import Panel from 'primevue/panel'
import LessonsListView from 'cmp/dataView/lessons/LessonsListView/LessonsListView'
import CourseMaterials from  'cmp/dataView/courses/CourseMaterials/CourseMaterials'

export default {
    name: 'CourseContent',

    components: {
        Panel,
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
