import {ApplicationClient} from 'api/client';

const endpoint = {
    audio: (course, lesson) => `/api/audio/${course}/${lesson}`,
    play: (course, lesson, name, extension) => `/api/audio/play/${course}/${lesson}/${name}/${extension}`,
}

class AudioClient extends ApplicationClient
{
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
     * @param data
     * @returns string
     */
    play({course, lesson, name, extension})
    {
        return endpoint.play(course, lesson, name, extension);
    }
}

export {
    AudioClient
}

export default AudioClient;
