import {AxiosResponse} from 'axios'
import {ApplicationClient} from 'api/client'

class PaymentsClient extends ApplicationClient
{
    get endpoints() {
        return {
            all: '/api/payments/all',
            site: '/api/payments/site',
        };
    }

    /**
     * @returns {Promise<AxiosResponse<AuthUserPayments>>}
     */
    site()
    {
        return this.client.get(this.endpoints.site);
    }
}

export {
    PaymentsClient
}

export default PaymentsClient
