import AuthAPI from 'model/AuthUser/AuthAPI'
import PaymentAPI from 'model/Payment/PaymentAPI'

const api = {
    auth: new AuthAPI,
    payment: new PaymentAPI,
}

export default api
