<template>
    <div class="lesson-reader"></div>
</template>

<script>
export default {
    name: 'LessonViewMozillaViewer',
    props: {
        src: String,
    },
    mounted() {
        this.open();
    },
    methods: {
        open() {
            const view = document.querySelector('.lesson-reader');
            const frame = document.createElement('iframe');
            frame.classList.add('lesson-reader-view');
            frame.src = '/esccpdf/viewer/mozilla/viewer.html';
            frame.name = this.src;

            view.appendChild(frame);
        },
    },
}
</script>
