import store from './index'

class Store {
    static setUserMutation(userData) {
        store.commit('auth/setUser', userData);
    }
}

export {
    Store,
}
