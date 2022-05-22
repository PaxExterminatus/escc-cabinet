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

    // Turnoff ---------------------------------------------------------------------------------------------------------

    turnoff() {
        this.pause();
        this.setSrc({src: '', title: ''});
        this.hide();
        this.full();
    }

    // Audio src -------------------------------------------------------------------------------------------------------

    get src() {
        return this.$store.state.audio.src;
    }

    setSrc({src, title})
    {
        this.$store.commit('audio/setSrc', {src, title});
        return this;
    }

    setSrcFirstOnList()
    {
        if (this.list.length)
        {
            this.setSrc({src: this.list[0].play_url, title: this.list[0].name});
            this.setSelected(this.list[0]);
        }
    }

    get selected() {
        return this.$store.state.audio.selected;
    }

    setSelected(lesson) {
        this.$store.commit('audio/setSelected', lesson);
    }

    // Pause and Play --------------------------------------------------------------------------------------------------

    get paused() {
        return this.$store.state.audio.paused;
    }

    pause()
    {
        this.$store.commit('audio/pause');
        return this;
    }

    play()
    {
        if (!this.src) this.setSrcFirstOnList();
        this.$store.commit('audio/play');
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

    full() {
        this.$store.commit('audio/compact', false);
        return this;
    }
}

export default AudioPlayerStoreAdapter;
