const state = () => ({
    user: {},
    client: {},
    loaded: false,
});

const mutations = {
    /**
     * @param {AuthState} store
     * @param {UserResponseData} userData
     */
    setUser (store, userData) {
        store.user = userData.user;
        store.client = userData.client;
        store.user.amount = 0;
        store.loaded = true;
    },
}

export default {
    namespaced: true,
    state,
    mutations,
};
