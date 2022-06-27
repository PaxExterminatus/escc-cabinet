import axios from 'axios'

class ApplicationClient {
    constructor() {
        this.client = axios.create({withCredentials: true});

        this.client.interceptors.request.use(this.requestInterceptor);
        this.client.interceptors.response.use(this.responseInterceptor, this.responseError);
    }

    /** @returns {{}} */
    get endpoints()
    {
        return {};
    }

    requestInterceptor(config) {
        return config;
    }

    responseInterceptor(response) {
        return response;
    }

    responseError(error) {
        return Promise.reject(error);
    }
}

export {
    ApplicationClient,
}
