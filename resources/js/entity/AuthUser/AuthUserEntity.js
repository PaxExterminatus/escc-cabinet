import store from 'app/store'
import api from 'api'

class AuthUserEntity {

    constructor() {
        this.api = api.auth;
        this.store = store.state.auth;
    }

    /** @returns {AuthUserFace} */
    user() {
        return this.store.user;
    }
}
