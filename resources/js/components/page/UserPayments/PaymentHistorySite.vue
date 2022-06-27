<template>
    <div>
        <PaymentsTable :payments="payments"/>
    </div>
</template>

<script>
import api from 'api'
import PaymentsTable from 'view/account/PaymentsTable'

export default {
    name: 'PaymentHistorySite',

    components: {
        PaymentsTable,
    },

    props: {
        tab: {
            type: Object,
            required: true,
        },
    },

    /** @returns {{payments: AuthUserPayment[]}}*/
    data() {
        return {
            payments: [],
        };
    },

    mounted() {
        this.getPayments();
    },

    methods: {
        getPayments() {
            console.log(this.currentTab);
            this.currentTab.wait();
            api.payments.site()
                .then(resp => {
                    this.payments = resp.data.payments;
                })
                .finally(() => {
                    this.currentTab.ready();
                });
        },
    },

    computed: {
        /** @returns {UserData} */
        user() {
            return this.$store.state.auth.user;
        },

        /** @returns {TabState|Object} */
        currentTab() {
            return this.tab;
        },
    },
}
</script>
