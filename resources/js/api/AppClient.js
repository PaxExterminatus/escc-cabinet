import axios from 'axios'

class AppClient {
    constructor(client = axios) {
        this.client = client;
    }

    static make() {
        return new AppClient();
    }

    signIn ({login, password})
    {
        this.client.get('/sanctum/csrf-cookie')
            .then(r => {
                console.log('sanctum', r)
                this.client.post('/login', {email: login, password})
                    .then(r => {
                        console.log('login', r.data);
                    })
            })
    }

    getUser() {
        this.client.get('/user')
            .then(r => {
                console.log('user', r);
            })
    }
}

export default AppClient

export {
    AppClient,
}
