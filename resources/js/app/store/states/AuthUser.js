import store from 'app/store'

class AuthUser {
    constructor() {
        this.name = 'N1';
        this.email = 'e1';
    }

    fill(user) {
        store.commit('auth/setUser', user);
    }
}

export default AuthUser;
