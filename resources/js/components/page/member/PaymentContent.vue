<template>
    <div class="page-component page-payment">
        <div class="app-container">
            <PayForm
                :code="input.payment.code"
                :amount="input.payment.amount"
                :name="input.payment.name"
                :surname="input.payment.surname"
                :email="input.payment.email"
                :phone="input.payment.phone"
            />
        </div>
    </div>
</template>

<script>
import api from 'api'
import Card from 'primevue/card'
import Button from 'primevue/button'
import InputNumber from 'primevue/inputnumber'
import Dialog from 'primevue/dialog'
import AccountBalance from 'cmp/data/account/Balance'
import { PayStructure } from 'api/structures'
import { PayForm, PayFormInput } from 'cmp/payment'

export default {
    components: {
        Card,
        Button,
        AccountBalance,
        InputNumber,
        Dialog,
        PayForm,
    },

    data() {
        return {
            input: {
                payment: new PayFormInput,
            },

            state: {
                loading: {
                    pay: false,
                },
            },

            payment: PayStructure.makeEmpty(),
            goto: null,
        };
    },

    methods: {
        makeBill() {
            this.state.loading.pay = true;
            api.payment.pay({amount: this.input.payment.amount})
                .then(data => {
                    this.goto = data.goto;
                    this.payment = data.payment;
                })
                .finally(() => {
                    this.state.loading.pay = false;
                });
        },

        makePayment() {
            //this.input.payment = PaymentInput.makeAccount(this.client.account);
        },
    },

    mounted() {
        this.makePayment();
    },

    watch: {
        client: {
            deep: true,
            handler: function () {
                this.makePayment();
            },
        }
    },

    computed: {
        /** @returns {ClientStore} */
        client() {
            return this.$store.state.auth.user;
        },
    },
}
</script>
