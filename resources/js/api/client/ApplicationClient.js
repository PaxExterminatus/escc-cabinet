import axios from 'axios'
import { APIClient } from "./APIClient";

class ApplicationClient extends APIClient {
    constructor() {
        super({
            axios: axios.create({
                withCredentials: true,
            }),
        });
    }
}

export {
    ApplicationClient,
}
