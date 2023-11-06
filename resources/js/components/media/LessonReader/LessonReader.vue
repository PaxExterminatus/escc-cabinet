<template>
    <div class="lesson-reader">
        <iframe @load="onLoadFrame" id="lesson-reader-iframe" :src="src"/>
    </div>
</template>

<script>

export default {
    name: 'LessonReader',
    props: {
        src: String,
    },
    methods: {
        onLoadFrame()
        {
            //const frame = document.getElementById('lesson-reader-iframe');
            //const doc = frame.contentWindow.document;
            //doc.getElementById('download').style.display = 'none';
            //doc.getElementById('secondaryDownload').style.display = 'none';
        },
    },
}
</script>
