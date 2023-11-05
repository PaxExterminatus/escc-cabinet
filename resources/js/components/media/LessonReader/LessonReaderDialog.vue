<template>
  <Dialog
      :auto-z-index="false"
      :base-z-index="5"
      class="lesson-reader-dialog"
      v-model:visible="visible"
      maximizable
      :header="title"
      position="left"
      @click="dialogOnClick"
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

  methods: {
    dialogOnClick(event) {
      //event.target.style.zIndex = Number(event.target.style.zIndex) + 1;
    },
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
