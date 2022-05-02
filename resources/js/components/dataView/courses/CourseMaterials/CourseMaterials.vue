<template>
    <span class="course-materials">
        <template v-if="clientCourse.audioCategory()">
            <InlineMessage class="course-materials-tag" severity="success">
                <span class="align-v-center-gap"><i class="pi pi-play"></i> Аудио</span>
            </InlineMessage>
        </template>
        <template v-if="clientCourse.videoCategory">
            <InlineMessage class="course-materials-tag" severity="success">
                <span class="align-v-center-gap"><i class="pi pi-video"></i> Видео</span>
            </InlineMessage>
        </template>
    </span>
</template>

<script>
import InlineMessage from 'primevue/inlinemessage'

export default {
    name: 'CourseMaterials',
    components: {
        InlineMessage,
    },
    props: {
        course: {
            type: Object,
            required: true,
        },
    },

    computed: {
        /** @returns {CourseData} */
        clientCourse() {
            return this.course;
        },
    },
}
</script>
