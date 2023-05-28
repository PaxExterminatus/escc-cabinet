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
};

export default {
    namespaced: true,
    state,
    mutations,
}
