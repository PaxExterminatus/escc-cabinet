import { ApplicationClient } from '../client/ApplicationClient'

class ApplicationAPI {
    constructor() {
        this.client = new ApplicationClient();
    }
}

export default ApplicationAPI;

export {
    ApplicationAPI,
}
