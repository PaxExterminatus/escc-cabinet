import axios from 'axios'
import { AxiosRequestConfig } from 'axios'

class ApplicationClient {
    /**
     * @param {AxiosRequestConfig} axiosConfig
     */
    constructor(axiosConfig) {
        this.client = axios.create(axiosConfig);

        this.client.interceptors.request.use(this.requestInterceptor);
        this.client.interceptors.response.use(this.responseInterceptor, this.responseError);
    }

    requestInterceptor(config) {
        console.log('APIClient.requestInterceptor');
        return config;
    }

    responseInterceptor(response) {
        console.log('APIClient.responseInterceptor');
        return response;
    }

    responseError(error) {
        console.log('APIClient.responseError')
        return Promise.reject(error);
    }
}

export {
    ApplicationClient,
}
