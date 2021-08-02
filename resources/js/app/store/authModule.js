import AuthUser from 'model/AuthUser/AuthUserStore'

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
    },
}

export default {
    namespaced: true,
    state,
    mutations,
};
