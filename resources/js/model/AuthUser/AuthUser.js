import store from 'app/store'
import AuthAPI from 'api/AuthAPI'
import {Store} from "app/store/Store";

const privates = {
    api: new AuthAPI(),
    store: store.state.auth.user,
}

class AuthUser {

    /** @param {CredentialsInput} credentials */
    login(credentials)
    {
        return new Promise((resolve, reject) => {

            privates.api.login({
                login: credentials.login,
                password: credentials.password,
            }).then(r => {
                /** @var {LoginResponseData} response */
                const data = r.data;
                Store.setUserMutation(data.user);
                resolve(r);
            }).catch(error => {
                reject(error);
            })
        });
    }
}

export default AuthUser;

export {
    AuthUser,
}
