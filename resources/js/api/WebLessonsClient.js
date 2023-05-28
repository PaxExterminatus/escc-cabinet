import {ApplicationClient} from 'api/client';

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

    show({course, lesson})
    {
        return this.client.get(endpoint.show(course, lesson))
            .then(response => {
                console.log(response);
            });
    }
}

export {
    WebLessonsClient,
}

export default WebLessonsClient;
