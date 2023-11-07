<template>
    <div class="lesson-reader">
        <canvas id="lesson-reader-view"/>
    </div>
</template>

<script>
import * as pdfjs from "pdfjs-dist/build/pdf";
pdfjs.GlobalWorkerOptions.workerSrc = `//cdnjs.cloudflare.com/ajax/libs/pdf.js/${pdfjs.version}/pdf.worker.js`;

export default {
    name: 'LessonReaderCanvas',
    components: {

    },
    props: {
        src: String,
    },
    data() {
        return {
            pages: {
                count: 0,
            },
        };
    },
    mounted() {
        this.$nextTick(() => {

            const pdf = pdfjs.getDocument(this.src).promise
                .then((doc) => {

                    doc.getPage(1).then(function(page) {
                        const scale = 1.5;
                        const viewport = page.getViewport({ scale: scale, });
                        const outputScale = window.devicePixelRatio || 1;
                        const canvas = document.getElementById('lesson-reader-view');
                        const context = canvas.getContext('2d');

                        canvas.width = Math.floor(viewport.width * outputScale);
                        canvas.height = Math.floor(viewport.height * outputScale);
                        canvas.style.width = Math.floor(viewport.width) + "px";

                        const transform = outputScale !== 1 ? [outputScale, 0, 0, outputScale, 0, 0] : null;

                        const renderContext = {
                            canvasContext: context,
                            transform: transform,
                            viewport: viewport
                        };

                        page.render(renderContext);
                    });
                })
                .catch((error) => {
                    console.log('catch');
                    console.log(error);
                });

        });
    },
    methods: {

    },
}
</script>
