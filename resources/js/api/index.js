import AuthAPI from 'api/AuthAPI'
import PaymentClient from './PaymentClient'
import AudioClient from './AudioClient';

const api = {
    auth: new AuthAPI,
    payment: new PaymentClient,
    audio: new AudioClient
}

export default api
