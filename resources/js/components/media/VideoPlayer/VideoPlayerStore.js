const state = () => ({
    show: false,
    list: [],
    title: '',
    src: '',
});

const mutations = {
    show(store) {
        store.show = true;
    },
    hide(store) {
        store.show = false;
    },
    setList(store, list) {
        store.list = list;
    },
    setTitle(store, title) {
        console.log('SET title', title)
        store.title = title;
    },
    play(store, url) {
        store.src = url;
    },
}

export default {
    namespaced: true,
    state,
    mutations,
};
