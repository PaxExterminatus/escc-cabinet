import { ApplicationClient } from 'api/client'
import { PayStructure } from 'api/structures'

const endpoint = {
    pay: '/pay',
}

class PaymentClient extends ApplicationClient {

    constructor() {
        super({
            withCredentials: true,
            baseURL: 'http://127.0.0.1:8000/api/payment',
        });
    }
    /**
     * @param {number} amount
     * @param {string} code
     * @param {string} email
     * @param {string} phone
     * @param {string} name
     * @param {string} surname
     * @returns {Promise<{goto: string, payment: PayStructure}>}
     */
    pay({amount, code, email, phone, name, surname})
    {
        const data = {
            amount,
            code: code ?? null,
            email: email ?? null,
            phone: phone ?? null,
            name: name ?? null,
            surname: surname ?? null,
        };

        return this.client.post(endpoint.pay, data)
            .then((response) => {
                /** @type {PayData} */
                const responseData = response.data;
                return {
                    payment: PayStructure.makeFromResponse(responseData.payment),
                    goto: responseData.goto,
                };
            })
    }
}

export default PaymentClient

export {
    PaymentClient,
}
