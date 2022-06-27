import { ApplicationClient } from 'api/client'
import { PayStructure } from 'api/structures'

class PaymentClient extends ApplicationClient {

    get endpoints()
    {
        return {
            pay: '/api/payment/pay',
        };
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

        return this.client.post(this.endpoints.pay, data)
            .then((response) => {
                /** @type {PayData} */
                const data = response.data;
                return {
                    payment: PayStructure.makeFromResponse(data.payment),
                    goto: data.goto,
                };
            })
    }
}

export default PaymentClient

export {
    PaymentClient,
}
