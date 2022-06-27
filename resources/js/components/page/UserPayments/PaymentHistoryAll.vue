<template>
<div>
    {{this.user.id}}
</div>
</template>

<script>
import { payments } from 'api'

export default {
    name: 'PaymentHistoryAll',

    computed: {
        /** @returns {UserData} */
        user() {
            return this.$store.state.auth.user;
        },
    },
}
</script>

