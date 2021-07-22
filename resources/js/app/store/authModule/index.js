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
        console.log('mutations.fillUser', user, data);
        user.data = data;
    },
}

export default {
    namespaced: true,
    state,
    mutations,
};
