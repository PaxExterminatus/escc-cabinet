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
        api.payments.site().then(resp => {
            this.payments = resp.data.payments;
        })
    },

    computed: {
        /** @returns {UserData} */
        user() {
            return this.$store.state.auth.user;
        },
    },
}
</script>
