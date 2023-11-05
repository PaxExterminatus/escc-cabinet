<template>
  <div class="lesson-reader">
    <iframe :src="src"/>
  </div>
</template>

<script>

export default {
  name: 'LessonReader',
  props: {
    src: Object,
  },
}
</script>
