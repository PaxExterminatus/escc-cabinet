<template>
  <Dialog
      :auto-z-index="false"
      :base-z-index="5"
      class="lesson-reader-dialog"
      v-model:visible="visible"
      maximizable
      :header="title"
      position="left"
  >
    <LessonsView :src="src"/>
  </Dialog>
</template>

<script>
import {reader} from './';
import Dialog from 'primevue/dialog';
import LessonsView from './LessonViewMozillaViewer.vue';

export default {
  name: 'LessonReaderDialog',
  components: {
    Dialog,
      LessonsView,
  },
  computed: {
    visible: {
      get: () => reader.display,
      set: () => reader.hide(),
    },
    title() {
      return reader.title ?? '';
    },
    src() {
      return reader.src;
    },
  },
}
</script>
