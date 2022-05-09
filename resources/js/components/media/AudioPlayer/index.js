import store from 'app/store'
import AudioPlayer from './AudioPlayer'
import AudioPlayerDialog from './AudioPlayerDialog'
import AudioPlayerStoreAdapter from './AudioPlayerStoreAdapter'


const audio = new AudioPlayerStoreAdapter(store);

export {
    AudioPlayer,
    AudioPlayerDialog,
    AudioPlayerStoreAdapter,
    audio,
}

export default audio;
