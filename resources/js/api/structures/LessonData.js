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
     */
    constructor(data = {}) {
        this.id = data.id ?? null;
        this.name = data.name ?? null;
        this.nodeId = data.node_id ?? null;
        this.courseId = data.course_id ?? null;
    }

    getAudioName()
    {
        return this.name.match(/\d\d-\d\d/)[0] || '';
    }
}

export {
    LessonData,
}
