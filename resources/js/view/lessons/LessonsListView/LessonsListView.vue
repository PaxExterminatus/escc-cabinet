<template>
    <div class="lessons-list-view">
        <template v-if="lessons.length">
            <DataTable :value="lessons">
                <Column field="name" header="Название">
                    <template #body="slotProps">
                        {{ slotProps.data.name }}
                    </template>
                </Column>

                <Column header="Урок">
                    <template #body="slotProps" v-if="courseData.webLessonsCategory">
                        <div class="audio-actions">
                            <i @click="getWebLesson(slotProps.data)" class="btn pi pi-file" v-tooltip.left="'Открыть Урок'">
                                <i class="pi pi-folder-open" style="font-size: 10px"></i>
                            </i>
                        </div>
                    </template>
                </Column>

                <Column header="Аудио" style="min-width: 30vh">
                    <template #body="slotProps" v-if="courseData.audioCategory">
                        <div class="audio-actions">
                            <i @click="getAudio(slotProps.data)" class="btn pi pi-play" v-tooltip.left="'Открыть Аудио'"/>
                            <div class="audio-sub-actions">
                                <i @click="getAudio(slotProps.data)" class="btn small pi pi-download" v-tooltip.left="'Скачать Аудио'"/>
                            </div>
                        </div>
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
import api from 'api'
import Column from 'primevue/column'
import Message from 'primevue/message'
import DataTable from 'primevue/datatable'
import SplitButton from 'primevue/splitbutton'

export default {
    components: {
        Column,
        Message,
        DataTable,
        SplitButton,
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
            const course = this.course.audioCategory?.code;
            const lesson = lessonData.getAudioName();

            api.audio.list({course, lesson});
        },
        /** @param {LessonData} lessonData */
        getWebLesson(lessonData) {
            const course = this.course.webLessonsCategory?.code;
            const lesson = lessonData.getPdfName();

            api.webLessons.show({course, lesson});
        }
    },
}
</script>
