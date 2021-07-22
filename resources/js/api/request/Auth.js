import { ApplicationRequest } from './ApplicationRequest'

const endpoint = {
    sanctumCsrf: '/sanctum/csrf-cookie',
    authUser: '/api/user',
    login: '/login'
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

    user() {
        this.client.axios.get(endpoint.authUser)
            .then(r => {
                console.log('user', r);
            })
    }
}

export default Auth;

export {
    Auth,
}
