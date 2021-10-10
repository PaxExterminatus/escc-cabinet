import {PayPaymentData} from './PayPaymentData';

export interface PayData {
    success: boolean
    goto: string
    payment: PayPaymentData
}
