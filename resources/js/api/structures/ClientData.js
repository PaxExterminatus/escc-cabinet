import { CourseData } from 'api/structures/CourseData'
/**
 * @typedef {{
 *     id: number
 *     name: string
 *     middle_name: string
 *     last_name: string
 *     courses: CourseResponseData[]
 *     total_deb: number,
 * }} ClientResponseData
 */

/**
 * @property {CourseData[]} courses
 */
class ClientData {
    /**
     * @param {ClientResponseData} data
     */
    constructor(data = {})
    {
        this.id = data.id ?? null;
        this.name = new ClientName(data.name, data.middle_name, data.last_name);
        this.courses = (data.courses ?? [])
            .map(courseResponseData => new CourseData(courseResponseData));
        this.account = new ClientAccount(data.total_deb);
    }
}

class ClientName {
    constructor(name, middle, last)
    {
        this.name = name ?? '';
        this.middle = middle ?? '';
        this.last = last ?? '';
    }

    get full() {
        return `${this.last} ${this.name} ${this.middle}`
    }

    get hello() {
        return `${this.name} ${this.middle}`
    }
}

class ClientAccount {
    constructor(balance) {
        this.balance = balance || 0;
    }

    get positiveBalance() {
        return this.balance > 0;
    }

    get negativeBalance() {
        return this.balance < 0;
    }
}

export {
    ClientData,
}
