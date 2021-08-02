import AuthUser from 'model/AuthUser/AuthUserStore'

const state = () => ({
    user: new AuthUser,
});

const mutations = {
    /**
     * @param {AuthUserStore} user
     * @param {AuthUserData} authUserData
     */
    fillUser ({user}, authUserData) {
        user.setAuthUserData(authUserData);
    },
}

export default {
    namespaced: true,
    state,
    mutations,
};
