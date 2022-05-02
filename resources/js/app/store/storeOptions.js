import auth from './authModule'
import audio from 'cmp/AudioPlayer/AudioPlayerStore'
import video from 'cmp/VideoPlayer/VideoPlayerStore'

const storeOptions = {
    modules: {
        auth,
        audio,
        video,
    },
    state: {},
    mutations: {},
}

export {
    storeOptions,
}
