const state = () => ({
    show: false,
    list: [],
    title: '',
    downloadUrl: null,
});

const mutations = {
    show(store) {
        store.show = true;
    },
    hide(store) {
        store.show = false;
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
    setTitle(store, title) {
        store.title = title;
    },
    setDownloadUrl(store, url) {
        store.downloadUrl = url;
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
