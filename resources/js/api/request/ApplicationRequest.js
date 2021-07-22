import { ApplicationClient } from '../client/ApplicationClient'

class ApplicationRequest {
    constructor() {
        this.client = new ApplicationClient();
    }
}

export {
    ApplicationRequest,
}
