<template>
    <div class="course-with-lessons-component">
        <DataTable
            :value="courses"
            v-model:expandedRows="state.expandedRows"
            dataKey="id"
            @row-expand="onRowExpand"
            @row-collapse="onRowCollapse"
        >
            <!--<Column :expander="true" headerStyle="width: 3rem"/>-->

            <Column field="count" header="Уроков">
                <template #body="slotProps">
                    {{slotProps.data.lessons.length}}
                </template>
            </Column>

            <Column field="name" header="Название">
                <template #body="slotProps">
                    <CourseLink :id="slotProps.data.node_id">
                        {{ slotProps.data.name }}
                    </CourseLink>
                </template>
            </Column>

            <Column field="materials" header="Учебные материалы">
                <template #body="slotProps">
                    <CourseMaterials :course="slotProps.data"/>
                </template>
            </Column>

            <Column field="state" header="Статус">
                <template #body="slotProps">
                    <CourseStateCell :value="slotProps.data.state"/>
                </template>
            </Column>

            <template #expansion="slotProps">
                <LessonsListView :lessons="slotProps.data.lessons"/>
            </template>
        </DataTable>
    </div>
</template>

<script>
import Panel from 'primevue/panel'
import Accordion from 'primevue/accordion'
import AccordionTab from 'primevue/accordiontab'
import DataTable from 'primevue/datatable'
import Column from 'primevue/column'
import CourseStateCell from './CourseStatus/CourseStatus'
import CourseLink from './CourseLink/CourseLink'
import LessonsListView from 'cmp/dataView/lessons/LessonsListView/LessonsListView'
import CourseMaterials from  'cmp/dataView/courses/CourseMaterials/CourseMaterials'

export default {
    components: {
        Accordion,
        AccordionTab,
        DataTable,
        Column,
        Panel,
        CourseStateCell,
        LessonsListView,
        CourseLink,
        CourseMaterials,
    },
    props: {
        data: {
            type: Array,
            default: [],
        },
    },

    data() {
        return {
            state: {
                expandedRows: [],
            },
        };
    },

    methods: {
        onRowExpand() {},
        onRowCollapse() {},
    },

    computed: {
        /**
         * Client courses
         * @return {ClientCourse[]}
         */
        courses() {
            return this.$store.state.auth.client.courses;
        },
    },
}
</script>
