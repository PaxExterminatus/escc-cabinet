<template>
  <Dialog
      class="lesson-reader-dialog"
      v-model:visible="visible"
      maximizable
      :header="title"
      position="left"
  >
    <LessonReader :src="src"/>
  </Dialog>
</template>

<script>
import LessonReader from './LessonReader.vue'
import Dialog from 'primevue/dialog'
import {reader} from './'

export default {
  name: 'LessonReaderDialog',

  components: {
    Dialog,
    LessonReader,
  },

  computed: {
    visible: {
      get: () => reader.display,
      set: () => reader.hide(),
    },
    title() {
      return reader.title;
    },
    src() {
      return reader.src;
    },
  },
}
</script>
