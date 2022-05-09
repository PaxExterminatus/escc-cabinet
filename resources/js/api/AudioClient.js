import {ApplicationClient} from 'api/client';

const endpoint = {
    audio: (course, lesson) => `/api/audio/${course}/${lesson}`,
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
}

export {
    AudioClient
}

export default AudioClient;
