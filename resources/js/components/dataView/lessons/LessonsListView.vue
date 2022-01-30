<template>
    <div class="lessons-table-component">
        <template v-if="lessons.length">
            <DataTable :value="lessons">
                <Column field="name" header="Name"/>
            </DataTable>
        </template>
        <template v-else>
            <Message :closable="false">Тут нет уроков</Message>
        </template>
    </div>
</template>

<script>
import DataTable from 'primevue/datatable'
import Column from 'primevue/column'
import Message from 'primevue/message'

export default {
    components: {
        DataTable,
        Column,
        Message,
    },
    props: {
        lessons: {
            type: Array,
            default: () => [],
        },
    },
}
</script>
