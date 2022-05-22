class AudioPlayerStoreAdapter
{
    constructor(store)
    {
        this.$store = store;
    }

    get display() {
        return this.$store.state.audio.show;
    }

    get compactState() {
        return this.$store.state.audio.compact;
    }

    get src() {
        return this.$store.state.audio.src;
    }

    setSrc({src, title})
    {
        this.$store.commit('audio/setSrc', {src, title});
        return this;
    }

    /** @returns {CurseAudio[]} */
    get list() {
        return this.$store.getters['audio/list'];
    }

    /** @return {string} */
    get downloadUrl() {
        return this.$store.getters['audio/downloadUrl'];
    }

    /**
     * @param {CurseAudio[]} audios
     * @return {AudioPlayerStoreAdapter}
     */
    listSet(audios) {
        this.$store.commit('audio/setList', audios);
        return this;
    }

    /**
     * @param {string} url
     * @return {AudioPlayerStoreAdapter}
     */
    downloadUrlSet(url) {
        this.$store.commit('audio/setDownloadUrl', url);
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

    /**
     * @param {boolean} state
     * @return {AudioPlayerStoreAdapter}
     */
    compact(state = true) {
        this.$store.commit('audio/compact', state);
        return this;
    }
}

export default AudioPlayerStoreAdapter;
