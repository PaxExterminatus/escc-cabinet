<template>
    <div>
        <DataTable :value="payments" responsiveLayout="scroll">
            <Column field="student" header="Код студента"/>
            <Column field="name" header="Имя"/>
            <Column field="surname" header="Фамилия"/>
            <Column field="phone" header="Телефон"/>
            <Column field="email" header="Email"/>
            <Column field="amount" header="Сума"/>
            <Column field="status" header="Статус"/>
            <Column field="created_at" header="Дата"/>
        </DataTable>

        {{}}
    </div>
</template>

<script>
import api from 'api';
import Column from 'primevue/column'
import DataTable from 'primevue/datatable'

export default {
    name: 'PaymentHistorySite',

    components: {
        Column,
        DataTable,
    },

    props: {
        tab: {
            type: Object,
            required: true,
        },
    },

    /**
     *
     * @returns {{payments: AuthUserPayment[]}}
     */
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
