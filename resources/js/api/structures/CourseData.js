import { LessonData } from 'api/structures/LessonData';

class CourseData {
    /** @type {undefined|CourseCategory} */
    audioCategoryData = undefined;
    videoCategoryData = undefined;

    /**
     * @param {ClientCourse} data
     */
    constructor(data= {}) {
        this.id = data.id ?? null;
        this.name = data.name ?? null;
        this.node_id = data.node_id ?? null;
        this.status = data.status ?? null;
        this.state = this.statusToState(data.status)
        this.categories = data.categories;
        this.lessons = (data.lessons ?? []).map(lessonResponseData => new LessonData(lessonResponseData, this.audioCategory()?.code))
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

    audioCategory()
    {
        if (this.audioCategoryData === undefined)
        {
            for (let category of this.categories)
            {
                if (category.parent_code === 'AUDIO')
                {
                    this.audioCategoryData = category;
                    break;
                }
            }
        }

        return this.audioCategoryData;
    }

    get videoCategory()
    {
        if (this.videoCategoryData === undefined)
        {
            for (let category of this.categories)
            {
                if (category.parent_code === 'VIDEO')
                {
                    this.videoCategoryData = category;
                    break;
                }
            }
        }

        return this.videoCategoryData;
    }
}

export {
    CourseData,
}
