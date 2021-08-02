import store from 'app/store'
import {ClientData} from "api/structures";

/**
 * @implements {AuthUserFace}
 */
class AuthUserStore {
    constructor() {
        this.model = new ClientData();
    }

    /** @param {AuthUserData} authUserData */
    fill(authUserData) {
        store.commit('auth/fillUser', authUserData);
    }

    /**
     * @return {ClientData}
     */
    get state() {
        return this.data;
    }

    /**
     * @return {CourseData[]}
     */
    get courses() {
        return this.data.courses ?? [];
    }

    /**
     * @return {ClientName}
     */
    get name() {
        return this.data.name;
    }

    /**
     * @returns {ClientAccount}
     */
    get account() {
        return this.data.account;
    }
}

export default AuthUser;
