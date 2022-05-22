const state = () => ({
    show: false,
    list: [],
    title: '',
    downloadUrl: null,
    compact: false,
    src: null,
});

const mutations = {
    show(store) {
        store.show = true;
    },
    hide(store) {
        store.show = false;
    },
    compact(store, state = true) {
        store.compact = state;
    },
    revers(store) {
        store.show = !store.show;
    },

    clearList() {
        this.list = [];
    },

    setList(store, list) {
        store.list = list;
    },

    setDownloadUrl(store, url) {
        store.downloadUrl = url;
    },

    setSrc(store, {src, title})
    {
        store.src = src;
        store.title = title;
    },

    setTitle(store, title)
    {
        store.title = title;
    },
}

const getters = {
    /**
     * @param state
     * @returns {CurseAudio[]}
     */
    list(state) {
        return state.list;
    },

    /**
     * @param state
     * @return {string}
     */
    downloadUrl(state) {
        return state.downloadUrl;
    },
}

export default {
    namespaced: true,
    state,
    mutations,
    getters,
}
