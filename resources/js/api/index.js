import AuthAPI from 'model/AuthUser/api/AuthAPI'
import PaymentClient from 'model/Payment/api'

const api = {
    auth: new AuthAPI,
    payment: new PaymentClient,
}

export default api
