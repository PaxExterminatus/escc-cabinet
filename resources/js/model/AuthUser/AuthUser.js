import store from 'app/store'
import AuthAPI from './api/AuthAPI'
import {Store} from "app/store/Store";

const privates = {
    api: new AuthAPI(),
    store: store.state.auth.user,
}

class AuthUser {

    /** @param {CredentialsInput} credentials */
    login(credentials) {

        return new Promise((resolve, reject) => {
            privates.api.login({
                login: credentials.login,
                password: credentials.password,
            }).then(r => {
                console.log(r);
                /** @var {LoginResponseData} response */
                const response = r.data;
                Store.setUserMutation(response.user);
                resolve(r);
            })
        });
    }

    /** @return {AuthUserData} */
    user() {
        return privates.store;
    }
}

export default AuthUser;

export {
    AuthUser,
}
