import AuthAPI from 'api/AuthAPI'
import PaymentClient from './PaymentClient'
import AudioClient from './AudioClient'
import VideoClient from './VideoClient'
import PaymentsClient from './payments/PaymentsClient'
import WebLessonsClient from './WebLessonsClient';

const auth = new AuthAPI;
const payment = new PaymentClient;
const audio = new AudioClient;
const video = new VideoClient;
const payments = new PaymentsClient;
const webLessons = new WebLessonsClient;

const api = {
    auth,
    payment,
    audio,
    video,
    payments,
    webLessons,
}

export default api

export {
    api,
    auth,
    payment,
    audio,
    video,
    payments,
    webLessons,
}
