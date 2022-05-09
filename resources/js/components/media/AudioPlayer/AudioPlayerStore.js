const state = () => ({
    show: false,
    list: [],
    title: '',
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
}

const getters = {
    /**
     * @param state
     * @returns {CurseAudio[]}
     */
    list(state) {
        return state.list;
    }
}

export default {
    namespaced: true,
    state,
    mutations,
    getters,
}
