const state = () => ({
    user: null,
    client: null,
});

const mutations = {
    /**
     * @param {AuthState} store
     * @param {UserResponseData} userData
     */
    setUser (store, userData) {
        store.user = userData.user;
        store.client = userData.client;
    },
}

export default {
    namespaced: true,
    state,
    mutations,
};
