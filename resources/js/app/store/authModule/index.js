import AuthUser from './AuthUser'

const state = () => ({
    user: new AuthUser,
});

const mutations = {
    /**
     * @param {AuthUserData} user
     * @param {AuthUserData} data
     */
    fillUser ({user}, data) {
        user.name = data.name;
        user.email = data.email;
    },
}

export default {
    namespaced: true,
    state,
    mutations,
};
