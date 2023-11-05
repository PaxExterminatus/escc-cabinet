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

  mounted() {
    this.$nextTick(function ()
    {
      console.log('mounted');
      console.log(pdfjsLib);
      pdfjsLib.getDocument('/01-02.pdf')
    });
  },

  methods: {
    async getPdf()
    {

    }
  },
}
</script>
