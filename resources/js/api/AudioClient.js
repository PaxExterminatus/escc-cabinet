import {ApplicationClient} from 'api/client';

const endpoint = {
    audio: function (course, lesson) {
        return `/api/audio/${course}/${lesson}`
    },
}

class AudioClient extends ApplicationClient {
    constructor() {
        super({
            withCredentials: true,
        });
    }

    audio({course, lesson})
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
