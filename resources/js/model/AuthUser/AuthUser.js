import store from 'app/store'
import AuthAPI from './AuthAPI'

/**
 * @type {{
 *     api: AuthAPI,
 *     store: AuthUserStore,
 * }}
 */
const privates = {
    api: new AuthAPI(),
    store: store.state.auth.user,
}

class AuthUser {

    /** @param {CredentialsInput} credentials */
    login(credentials) {
        return privates.api.login({
            login: credentials.login,
            password: credentials.password,
        }).then(r => {
            privates.store.fill(r.data.user);
        })
    }

    /** @return {AuthUserStore} */
    user() {
        return privates.store;
    }
}

export default AuthUser;

export {
    AuthUser,
}
