<template>
    <div class="lessons-list-view">

        <template v-if="lessons.length">
            <DataTable :value="lessons">
                <Column field="name" header="Название">
                    <template #body="slotProps">
                        <a href="#">{{ slotProps.data.name }}</a>
                    </template>
                </Column>
            </DataTable>
        </template>

        <template v-else>
            <Message :closable="false">Тут нет уроков</Message>
        </template>
    </div>
</template>

<script>
import Column from 'primevue/column'
import Message from 'primevue/message'
import DataTable from 'primevue/datatable'

export default {
    components: {
        Column,
        Message,
        DataTable,
    },

    props: {
        lessons: {
            type: Array,
            default: () => [],
        },
    },
}
</script>
