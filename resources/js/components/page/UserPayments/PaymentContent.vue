<template>
    <div class="page-component page-payment">
        <h2>Новый платеж</h2>

        <div class="app-container">
            <PayForm :input="input.payment"/>
        </div>

        <h2>История платежей</h2>

        <template v-if="user">
            <PaymentHistory :user-id="user.id"/>
        </template>
    </div>
</template>

<script>
import api from 'api'
import Card from 'primevue/card'
import Button from 'primevue/button'
import InputNumber from 'primevue/inputnumber'
import Dialog from 'primevue/dialog'
import AccountBalance from 'view/account/Balance'
import {PayStructure} from 'api/structures'
import {PayForm, PayFormInput} from 'cmp/payment'
import PaymentHistory from './PaymentHistory'

export default {
    components: {
        Card,
        Button,
        AccountBalance,
        InputNumber,
        Dialog,
        PayForm,
        PaymentHistory,
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

    mounted() {
        if (this.user) this.input.payment.fillFormAuthUser(this.user);
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
    },

    watch: {
        '$store.state.auth.user': function () {
            this.input.payment.fillFormAuthUser(this.user);
        },
    },

    computed: {
        /** @returns {UserData} */
        user() {
            return this.$store.state.auth.user;
        },
    },
}
</script>
