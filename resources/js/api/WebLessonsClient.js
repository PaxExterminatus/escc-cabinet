import { ApplicationClient } from 'api/client';

const endpoint = {
    show: (course, lesson) => `/api/lessons/web/show/course/${course}/lesson/${lesson}`,
}

class WebLessonsClient  extends ApplicationClient
{
    constructor() {
        super({withCredentials: true});
    }

    /**
     * @param course
     * @param lesson
     * @returns {Promise<AxiosResponse<any>>}
     */
    show({course, lesson}) {
        return this.client.get(this.src({course, lesson}));
    }

    /**
     * @param course
     * @param lesson
     * @returns {string}
     */
    src({course, lesson}) {
        return endpoint.show(course, lesson);
    }
}

export {
    WebLessonsClient,
}

export default WebLessonsClient;
