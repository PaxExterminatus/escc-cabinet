import store from 'app/store'
import {ApplicationClient} from 'api/client';
import {Store} from 'app/store/Store';

const endpoint = {
    sanctumCsrf: '/sanctum/csrf-cookie',
    login: '/login',
    logout: '/logout',
    authUser: '/api/user',
}

class AuthAPI extends ApplicationClient {

    constructor() {
        super({
            withCredentials: true,
        });
    }

    /**
     * @param {CredentialsInput} credentials
     * @return Promise<LoginResponse>
     */
    login (credentials)
    {
        const loginData = {
            email: credentials.login,
            password: credentials.password,
        };

        return new Promise((resolve, reject) => {
            this.client.get(endpoint.sanctumCsrf)
                .then(() => {
                    return this.client.post(endpoint.login, loginData)
                        .then(r => {
                            resolve(r);
                        });
                });
        })
    }

    logout()
    {
        return this.client.post(endpoint.logout)
            .then(r => {
                location.reload();
                return r;
            });
    }

    user()
    {
        return this.client.get(endpoint.authUser)
            .then(r => {
                /** @var {UserResponse} response */
                const response = r;
                Store.setUserMutation(response.data);
            })
    }

    store() {
        return store.state.auth;
    }
}

export default AuthAPI;

export {
    AuthAPI,
}
