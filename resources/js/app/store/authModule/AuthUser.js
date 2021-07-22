import store from 'app/store'

class AuthUser {
    constructor() {
        this.name = '';
        this.email = '';
    }

    fill(user) {
        store.commit('auth/fillUser', user);
    }
}

export default AuthUser;
