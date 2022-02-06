<template>
    <div class="lessons-list-view">
        <template v-if="lessons.length">
            <DataTable :value="lessons">
                <Column field="name" header="Название">
                    <template #body="slotProps">
                        {{ slotProps.data.name }}
                    </template>
                </Column>

                <Column header="Аудио">
                    <template #body="slotProps" v-if="courseData.audioCategory()">
                        <i @click="getAudio(slotProps.data)" class="btn-ico pi pi-play" style="font-size: 2rem"/>
                    </template>
                </Column>
            </DataTable>
        </template>

        <template v-else>
            <Message :closable="false">Тут нет уроков</Message>
        </template>
    </div>
</template>

<script>
import Column from 'primevue/column'
import Message from 'primevue/message'
import DataTable from 'primevue/datatable'
import api from 'api'

export default {
    components: {
        Column,
        Message,
        DataTable,
    },

    props: {
        lessons: {
            type: Array,
            default: () => [],
        },
        course: {
            type: Object,
        },
    },

    computed: {
        /** @returns {CourseData} */
        courseData() {
            return this.course;
        },
    },

    methods: {
        /** @param {LessonData} lessonData */
        getAudio(lessonData) {
            const course = this.course.audioCategory()?.code;
            const lesson = lessonData.getAudioName();
            console.log('getAudio', lesson)
            api.audio.list({course, lesson})
                .then(files => {
                    this.$store.commit('audio/show');
                    this.$store.commit('audio/setList', files);
                    this.$store.commit('audio/setTitle', lesson.name);
                })
        },
    },
}
</script>
