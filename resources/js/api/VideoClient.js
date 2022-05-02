import {ApplicationClient} from 'api/client';

const endpoint = {
    video: (course) => `/api/video/${course}`,
    play: (course, name, extension) => `/api/audio/play/${course}/${name}/${extension}`,
}

class VideoClient extends ApplicationClient
{
    constructor() {
        super({
            withCredentials: true,
        });
    }

    /**
     * @param {string} courseCode
     * @returns {Promise<AxiosResponse<any>>}
     */
    list(courseCode) // todo add response type
    {
        return this.client.get(endpoint.video(courseCode))
            .then(response => {
                return response.data.files;
            })
    }

    /**
     * @param data
     * @returns string
     */
    play({course, name, extension})
    {
        return endpoint.play(course, name, extension);
    }
}

export {
    VideoClient
}

export default VideoClient;
