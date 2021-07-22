import { ApplicationRequest } from './ApplicationRequest'
import store from 'app/store'

const endpoint = {
    sanctumCsrf: '/sanctum/csrf-cookie',
    authUser: '/api/user',
    login: '/login',
    logout: '/logout',
}

class Auth extends ApplicationRequest {
    /**
     * @param login
     * @param password
     * @returns {Promise<LoginResponse>}
     */
    login ({login, password})
    {
        return new Promise((resolve, reject) => {
            this.client.axios.get(endpoint.sanctumCsrf)
                .then(() => {
                    return this.client.axios.post(endpoint.login, {email: login, password})
                        .then(r => {
                            resolve(r);
                        });
                });
        })
    }

    logout()
    {
        return this.axios.get(this.url(endpoint.logout))
            .then(r => {
                location.reload();
                return response;
            });
    }

    user()
    {
        return this.client.axios.get(endpoint.authUser)
            .then(r => {
                console.log('user', r.data.user, store.state.auth.user)
                store.state.auth.user.fill(r.data.user);
            })
    }
}

export default Auth;

export {
    Auth,
}
