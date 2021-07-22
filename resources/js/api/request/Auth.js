import { ApplicationRequest } from './ApplicationRequest'

const endpoint = {
    sanctumCsrf: '/sanctum/csrf-cookie',
    authUser: '/api/user',
}

class Auth extends ApplicationRequest {
    constructor() {
        super();
    }

    login ({login, password})
    {
        this.client.axios.get(endpoint.sanctumCsrf)
            .then(r => {
                console.log('sanctum', r)
                this.client.axios.post('/login', {email: login, password})
                    .then(r => {
                        console.log('login', r.data);
                    })
            })
    }

    me() {
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
