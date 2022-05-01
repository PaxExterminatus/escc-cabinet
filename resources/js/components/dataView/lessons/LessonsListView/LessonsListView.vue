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
                        <SplitButton icon="pi pi-play" class="p-button-secondary p-button-text"
                            :model="slotProps.data.audioMenu"
                        >
                            <i @click="getAudio(slotProps.data)" class="btn-ico pi pi-play" style="font-size: 2rem"/>
                        </SplitButton>
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
import SplitButton from 'primevue/splitbutton'

export default {
    components: {
        Column,
        Message,
        DataTable,
        SplitButton,
    },

    data () {
        return {
            audioBtnMenu: [
                {
                    label: 'Скачать аудио',
                    icon: 'pi pi-download',
                    url: '/api/audio/download/AUDIO_ANN/01-02',
                },
            ],
        };
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
                .then(files => {
                    this.$store.commit('audio/show');
                    this.$store.commit('audio/setList', files);
                    this.$store.commit('audio/setTitle', lesson.name);
                })
        },
    },
}
</script>
