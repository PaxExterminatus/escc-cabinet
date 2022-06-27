<template>
    <div class="page-component">
        <template v-if="client">
            <h1>{{course.name}}</h1>

            <template v-if="course.videoCategory && videos">
                <Panel class="panel-with-table">
                    <template #header>
                        <h2 class="align-v-center-gap">
                            <i class="pi pi-video"/> Видео
                        </h2>
                    </template>

                    <DataTable :value="videos">
                        <Column field="name" header="Название">
                            <template #body="slotProps">
                                <Button class="p-button-secondary p-button-text" icon="pi pi-play"
                                        :label="slotProps.data.name"
                                        @click="playVideo(slotProps.data)"
                                />
                            </template>
                        </Column>
                    </DataTable>

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
import api from 'api'
import Panel from 'primevue/panel'
import Button from 'primevue/button'
import Column from 'primevue/column'
import DataTable from 'primevue/datatable'
import CourseMaterials from  'view/courses/CourseMaterials/CourseMaterials'
import LessonsListView from 'view/lessons/LessonsListView/LessonsListView'
import VideoPlayer from 'cmp/VideoPlayer/VideoPlayer'

export default {
    name: 'CourseContent',

    components: {
        Panel,
        Button,
        Column,
        DataTable,
        CourseMaterials,
        LessonsListView,
        VideoPlayer,
    },

    props: {
        courseId: {
            require: true,
            type: String,
        },
    },

    data() {
        return {
            videos: null,
        };
    },

    methods: {
        checkUser(callback) {
            if (!this.client) return null;
            return callback();
        },
        playVideo({play_url, title}) {
            this.$store.commit('video/play', play_url);
            this.$store.commit('video/show');
            this.$store.commit('video/setTitle', title);

        },
        getVideos() {
            if (this.course.videoCategory)
            {
                api.video.list(this.course.videoCategory.code)
                    .then(resp => {
                        this.videos = resp;
                    });
            }
        }
    },

    mounted() {
        if (this.client) {
            this.getVideos();
        }
    },

    watch: {
        client() {
            this.getVideos();
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
