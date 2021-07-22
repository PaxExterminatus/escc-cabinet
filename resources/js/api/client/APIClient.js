class APIClient {
    constructor({axios}) {
        this.axios = axios;

        this.axios.interceptors.request.use(this.requestInterceptor);
        this.axios.interceptors.response.use(this.responseInterceptor, this.responseError);
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
    APIClient,
}
