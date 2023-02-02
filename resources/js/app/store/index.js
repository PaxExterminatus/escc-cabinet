import { createStore } from 'vuex'
import auth from 'app/store/authModule';
import audio from 'cmp/media/AudioPlayer/AudioPlayerStore';
import video from 'cmp/VideoPlayer/VideoPlayerStore';

const store = createStore({
    modules: {
        auth,
        audio,
        video,
    },
    state: {},
    mutations: {},
});

export default store;
