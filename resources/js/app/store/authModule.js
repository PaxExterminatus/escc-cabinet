const state = () => ({
    user: {
        amount: 0,
    },
});

const mutations = {
    /**
     * @param {{user: AuthUserData}} store
     * @param {AuthUserData} authUserData
     */
    setUser (store, authUserData) {
        store.user = authUserData;
        store.user.amount = 0;
    },
}

export default {
    namespaced: true,
    state,
    mutations,
};
