import auth from './authModule'
import audio from './AudioPlayer/AudioPlayerStore'

const storeOptions = {
    modules: {
        auth,
        audio,
    },
    state: {},
    mutations: {},
}

export {
    storeOptions,
}
