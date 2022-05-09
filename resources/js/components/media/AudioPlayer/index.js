import store from 'app/store'
import AudioPlayer from './AudioPlayer'
import AudioPlayerDialog from './AudioPlayerDialog'
import AudioPlayerStoreAdapter from './AudioPlayerStoreAdapter'

const audioPlayer = new AudioPlayerStoreAdapter(store);

export {
    AudioPlayer,
    AudioPlayerDialog,
    AudioPlayerStoreAdapter,
    audioPlayer,
}

export default audioPlayer;
