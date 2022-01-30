<template>
    <div class="course-with-lessons-component">
        <DataTable
            :value="courses"
            v-model:expandedRows="state.expandedRows"
            dataKey="id"
            @row-expand="onRowExpand"
            @row-collapse="onRowCollapse"
        >
            <Column :expander="true" headerStyle="width: 3rem"/>
            <Column field="count" header="Уроков">
                <template #body="slotProps">
                    {{slotProps.data.lessons.length}}
                </template>
            </Column>
            <Column field="name" header="Название"/>
            <Column field="state" header="Статус">
                <template #body="slotProps">
                    <CourseStateCell :value="slotProps.data.state"/>
                </template>
            </Column>
            <template #expansion="slotProps">
                <LessonsTable :lessons="slotProps.data.lessons"/>
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
import LessonsTable from 'cmp/dataView/lessons/LessonsListView'
import {CourseData} from 'api/structures/CourseData';

export default {
    components: {
        Accordion,
        AccordionTab,
        DataTable,
        Column,
        Panel,
        CourseStateCell,
        LessonsTable,
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
         * @return {CourseData[]}
         */
        courses() {
            const courses = this.data.map((courseData) => new CourseData(courseData))
            const active = courses.filter(course => course.state === 'active');
            const done = courses.filter(course => course.state === 'done');
            const stop = courses.filter(course => course.state === 'stop');
            return [
                ...active,
                ...done,
                ...stop,
            ];
        },
    },
}
</script>
