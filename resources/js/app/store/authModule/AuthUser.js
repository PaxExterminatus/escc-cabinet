import store from 'app/store'

class AuthUser {
    constructor() {
        this.name = '';
        this.email = '';
    }

    fill(user) {
        store.commit('auth/setUser', user);
    }
}

export default AuthUser;
