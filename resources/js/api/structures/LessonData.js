/**
 * @typedef {{
 *     id: number
 *     name: string
 *     course_id: number
 *     node_id: number
 * }} LessonResponseData
 */

class LessonData {
    /**
     * @param {LessonResponseData} data
     * @param {string} courseAudioCategoryCode
     */
    constructor(data = {}, courseAudioCategoryCode)
    {
        this.id = data.id ?? null;
        this.name = data.name ?? null;
        this.nodeId = data.node_id ?? null;
        this.courseId = data.course_id ?? null;
        this.audioCategoryCode = courseAudioCategoryCode;
    }

    /**
     * @returns {string|null}
     */
    getAudioName()
    {
        let matches = this.name.match(/\d\d-\d\d/);

        if (!matches)
        {
            matches = this.name.match(/ДМ \d/);
        }

        return matches ? matches[0] : null;
    }

    get audioMenu()
    {
        //todo move template to class
        if (this.audioCategoryCode) {
            return [
                {
                    label: 'Скачать Аудио',
                    icon: 'pi pi-download',
                    url: `/api/audio/download/course/${this.audioCategoryCode}/lesson/${this.getAudioName()}`,
                },
            ];
        }
        return null;
    }
}

export {
    LessonData,
}
