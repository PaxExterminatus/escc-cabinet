<template>
    <div class="lessons-list-view">
        <template v-if="lessons.length">
            <DataTable :value="lessons">
                <Column field="name" header="Название">
                    <template #body="slotProps">
                        {{ slotProps.data.name }}
                    </template>
                </Column>

                <Column header="Аудио" style="min-width: 30vh">
                    <template #body="slotProps" v-if="courseData.audioCategory()">
                        <div class="audio-actions">
                            <i @click="getAudio(slotProps.data)" class="btn pi pi-play" v-tooltip.left="'Аудио'"/>
                            <div class="audio-sub-actions">
                                <i @click="getAudio(slotProps.data)" class="btn small pi pi-download" v-tooltip.left="'Скачать аудио'"/>
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
            const course = this.course.audioCategory()?.code;
            const lesson = lessonData.getAudioName();

            api.audio.list({course, lesson})
        },
    },
}
</script>
