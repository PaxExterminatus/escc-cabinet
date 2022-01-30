<template>
    <span class="course-status">
        <InlineMessage :severity="severity">{{label}}</InlineMessage>
    </span>
</template>

<script>
import InlineMessage from 'primevue/inlinemessage'

export default {
    components: {
        InlineMessage,
    },

    props: {
        value: {
            type: String,
            default: '',
        },
    },

    computed: {
        label() {
            return this.value.toUpperCase();
        },

        severity() {
            if (this.value === 'active') return 'success';
            if (this.value === 'done') return 'info';
            if (this.value === 'stop') return 'warn';
        },
    },
}
</script>
