<template>
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
