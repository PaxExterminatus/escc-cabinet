import store from 'app/store'
import {ClientData} from "api/structures";

class AuthUser {
    constructor() {
        this.data = new ClientData();
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
