import APIResponse from '../APIResponse'
import AuthUserPayment from './AuthUserPayment'

interface AuthUserPayments extends APIResponse
{
    payments: AuthUserPayment[]
}
