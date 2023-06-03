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
    setTitle(store, title) {
      store.title = title;
    },
    setSrc(store, src) {
        store.src = src;
    },
};

export default {
    namespaced: true,
    state,
    mutations,
}
