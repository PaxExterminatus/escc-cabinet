const state = () => ({
    user: null,
});

const mutations = {
    /**
     * @param {AuthUserData} store
     * @param {AuthUserData} authUserData
     */
    setUser (store, authUserData) {
        store.user = authUserData;
    },
}

export default {
    namespaced: true,
    state,
    mutations,
};
