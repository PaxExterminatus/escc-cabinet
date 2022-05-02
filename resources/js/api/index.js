import AuthAPI from 'api/AuthAPI'
import PaymentClient from './PaymentClient'
import AudioClient from './AudioClient';
import VideoClient from './VideoClient';

const api = {
    auth: new AuthAPI,
    payment: new PaymentClient,
    audio: new AudioClient,
    video: new VideoClient,
}

export default api
