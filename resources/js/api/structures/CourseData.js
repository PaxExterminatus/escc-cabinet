import { LessonData } from 'api/structures/LessonData';

class CourseData {
    constructor(data= {}) {
        this.id = data.id ?? null;
        this.name = data.name ?? null;
        this.node_id = data.node_id ?? null;
        this.status = data.status ?? null;
        this.state = this.statusToState(data.status)
        this.lessons = (data.lessons ?? []).map(lessonResponseData => new LessonData(lessonResponseData))
    }

    statusToState(status) {
        if (status === 'active') return 'active';
        if (status === 'finishing') return 'active';
        if (status === 'outage') return 'active';
        if (status === 'finished') return 'done';
        if (status === 'refusing') return 'stop';
        if (status === 'not active') return 'stop';
        if (status === 'error') return 'stop';
    }
}

export {
    CourseData,
}
