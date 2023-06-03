import { ApplicationClient } from 'api/client';

const endpoint = {
    show: (course, lesson) => `/api/lessons/web/show/course/${course}/lesson/${lesson}`,
}

class WebLessonsClient  extends ApplicationClient
{
    constructor() {
        super({
            withCredentials: true,
        });
    }

    /**
     * @param course
     * @param lesson
     * @returns {Promise<axios.AxiosResponse<any>>}
     */
    show({course, lesson})
    {
        return this.client.get(endpoint.show(course, lesson));
    }
}

export {
    WebLessonsClient,
}

export default WebLessonsClient;
