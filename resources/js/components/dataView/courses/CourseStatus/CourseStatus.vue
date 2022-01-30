<template>
    <InlineMessage class="course-status" :severity="statusSeverity">{{label}}</InlineMessage>
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
            return this.statusText.toUpperCase();
        },

        statusText() {
            if (this.value === 'active') return 'Активный';
            if (this.value === 'done') return 'Завершен';
            if (this.value === 'stop') return 'Остановлен';
        },

        statusSeverity() {
            if (this.value === 'active') return 'success';
            if (this.value === 'done') return 'info';
            if (this.value === 'stop') return 'warn';
        },
    },
}
</script>
