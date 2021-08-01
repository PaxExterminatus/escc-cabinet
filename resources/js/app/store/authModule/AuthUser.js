import store from 'app/store'
import {ClientData} from "api/structures";

/**
 * @implements {AuthUserFace}
 */
class AuthUser {
    constructor() {
        this.model = new ClientData();
    }

    /**
     * @param {ClientData} userData
     */
    fill(userData) {
        store.commit('auth/fillUser', userData);
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
