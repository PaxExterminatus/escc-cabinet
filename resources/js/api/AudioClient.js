import {ApplicationClient} from 'api/client';
import audioPlayer from 'cmp/media/AudioPlayer';

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
                this.distributeListData(response.data);
            })
    }

    /**
     * @param {CurseAudioData} data
     */
    distributeListData(data)
    {
        audioPlayer
            .listSet(data.files)
            .downloadUrlSet(data.download_url)
            .show();
    }
}

export {
    AudioClient
}

export default AudioClient;
