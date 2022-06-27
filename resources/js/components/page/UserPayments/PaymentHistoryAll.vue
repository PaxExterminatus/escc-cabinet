<template>
<div>
    <PaymentsTable :payments="payments"/>
</div>
</template>

<script>
import api from 'api'
import PaymentsTable from 'view/account/PaymentsTable'

export default {
    name: 'PaymentHistoryAll',

    components: {
        PaymentsTable,
    },

    /** @returns {{payments: AuthUserPayment[]}}*/
    data() {
        return {
            payments: [],
        };
    },

    mounted() {

    },

    computed: {
        /** @returns {UserData} */
        user() {
            return this.$store.state.auth.user;
        },
    },
}
</script>
