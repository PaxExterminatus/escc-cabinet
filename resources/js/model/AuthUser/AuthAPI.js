import store from 'app/store'
import {ApplicationClient} from 'api/client';

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
            baseURL: 'http://127.0.0.1:8000',
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
                return response;
            });
    }

    user()
    {
        return this.client.get(endpoint.authUser)
            .then(r => {
                console.log('user', r.data.user, store.state.auth.user)
                store.state.auth.user.fill(r.data.user);
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
