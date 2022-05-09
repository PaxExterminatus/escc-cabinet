class AudioPlayerStoreAdapter
{
    constructor(store)
    {
        this.$store = store;
    }

    get display() {
        return this.$store.state.audio.show;
    }

    get list() {
        return this.$store.state.audio.list;
    }

    /**
     * @returns {AudioPlayerStoreAdapter}
     */
    clear() {
        this.$store.commit('audio/clearList');
        return this;
    }

    /**
     * @returns {AudioPlayerStoreAdapter}
     */
    hide() {
        this.$store.commit('audio/hide');
        return this;
    }
}

export default AudioPlayerStoreAdapter;
