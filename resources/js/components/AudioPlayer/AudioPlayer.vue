<template>
    <Dialog
        class="audio-player"
        position="topright"
        :header="title"
        v-model:visible="display"
        :style="{height: '100vh', maxHeight: 'calc(100% - 10px)', margin: '5px 0 5px 0'}"
    >
        <List v-model="selected" :options="list" optionLabel="name"/>
    </Dialog>
</template>

<script>
import List from 'primevue/listbox';
import Dialog from 'primevue/dialog'

export default {
    name: 'AudioPlayer',
    components: {
        List,
        Dialog,
    },
    data() {
        return {
            selected: null,
        };
    },
    computed: {
        display: {
            get() {
                return this.$store.state.audio.show;
            },
            set() {
                this.$store.commit('audio/revers');
            }
        },
        list() {
            return this.$store.state.audio.list;
        },
        title() {
            return this.$store.state.audio.title;
        }
    },
}
</script>
