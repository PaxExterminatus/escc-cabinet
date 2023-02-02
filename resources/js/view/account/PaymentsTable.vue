<template>
    <DataTable :value="payments" responsiveLayout="scroll">
        <Column field="client_id" header="Код студента"/>
        <Column field="iname" header="Имя"/>
        <Column field="fname" header="Фамилия"/>
        <Column field="phone" header="Телефон"/>
        <Column field="email" header="Email"/>
        <Column field="price_total" header="Сума"/>
        <Column field="bill_status" header="Статус"/>
        <Column field="created_at" header="Дата"/>
    </DataTable>
</template>

<script>
import Column from 'primevue/column'
import DataTable from 'primevue/datatable'

export default {
    name: 'PaymentsTable',

    components: {
        Column,
        DataTable,
    },

    props: {
        payments: {
            type: Array,
            default: () => [],
        },
    },

}
</script>
