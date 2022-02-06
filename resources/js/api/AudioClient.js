import {ApplicationClient} from 'api/client';

const endpoint = {
    audio: (course, lesson) => `/api/audio/${course}/${lesson}`,
    play: '/api/audio/play/',
}

class AudioClient extends ApplicationClient {
    constructor() {
        super({
            withCredentials: true,
        });
    }

    list({course, lesson}) // todo add response type
    {
        return this.client.get(endpoint.audio(course, lesson))
            .then(response => {
                const data = response.data;
                return data.files;
            })
    }

    /**
     *
     * @param data
     * @returns string
     */
    play({course, lesson, name, extension})
    {
        return `/api/audio/play/${course}/${lesson}/${name}/${extension}`;
    }
}

export {
    AudioClient
}

export default AudioClient;
