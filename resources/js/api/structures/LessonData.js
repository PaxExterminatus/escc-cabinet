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

    getAudioName()
    {
        return this.name.match(/\d\d-\d\d/)[0] || '';
    }

    get audioMenu()
    {
        //todo move template to class
        if (this.audioCategoryCode) {
            return [
                {
                    label: 'Скачать аудио',
                    icon: 'pi pi-download',
                    url: `/api/audio/download/${this.audioCategoryCode}/${this.getAudioName()}`,
                },
            ];
        }
        return null;
    }
}

export {
    LessonData,
}
