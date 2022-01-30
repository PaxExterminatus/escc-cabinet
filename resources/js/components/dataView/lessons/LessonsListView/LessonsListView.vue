<template>
    <div class="lessons-list-view">
        <template v-if="lessons.length">
            <DataTable :value="lessons">
                <Column field="name" header="Название">
                    <template #body="slotProps">
                        {{ slotProps.data.name }}
                    </template>
                </Column>

                <Column header="Аудио">
                    <template #body="slotProps">
                        <i class="btn-ico pi pi-play" style="font-size: 2rem"/>
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

    methods: {
        openAudio() {

        }
    },
}
</script>
