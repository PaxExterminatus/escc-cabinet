import AuthAPI from 'api/AuthAPI'
import PaymentClient from './PaymentClient'
import AudioClient from './AudioClient'
import VideoClient from './VideoClient'
import PaymentsClient from './payments/PaymentsClient'

const auth = new AuthAPI;
const payment = new PaymentClient;
const audio = new AudioClient;
const video = new VideoClient;
const payments = new PaymentsClient;

const api = {
    auth,
    payment,
    audio,
    video,
    payments,
}

export default api

export {
    api,
    auth,
    payment,
    audio,
    video,
    payments,
}
