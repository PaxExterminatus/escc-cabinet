const state = () => ({
    user: {},
    client: {},
});

const mutations = {
    /**
     * @param {{user: AuthUser}} store
     * @param {UserResponseData} userData
     */
    setUser (store, userData) {
        store.user = userData.user;
        store.client = userData.client;
        store.user.amount = 0;
    },
}

export default {
    namespaced: true,
    state,
    mutations,
};
