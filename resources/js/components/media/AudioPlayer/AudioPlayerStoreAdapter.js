class AudioPlayerStoreAdapter
{
    constructor(store)
    {
        this.$store = store;
    }

    get display() {
        return this.$store.state.audio.show;
    }

    /** @returns {CurseAudio[]} */
    get list() {
        return this.$store.getters['audio/list'];
    }

    /**
     * @param {CurseAudio[]} audios
     * @return {AudioPlayerStoreAdapter}
     */
    listSet(audios) {
        this.$store.commit('audio/setList', audios);
        return this;
    }

    /** @returns {AudioPlayerStoreAdapter} */
    clear() {
        this.$store.commit('audio/clearList');
        return this;
    }

    /** @returns {AudioPlayerStoreAdapter} */
    show() {
        this.$store.commit('audio/show');
        return this;
    }

    /** @returns {AudioPlayerStoreAdapter} */
    hide() {
        this.$store.commit('audio/hide');
        return this;
    }
}

export default AudioPlayerStoreAdapter;
