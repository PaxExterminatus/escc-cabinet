<template>
    <div class="page-component page-payment">
        <Card>
            <template #title>
                To make a payment
            </template>

            <template #content>
                <div class="important-information">
                    <header>Внимание!</header>
                    <main>Ваш платеж будет зачислен и отображен в кабинете студента в течение двух рабочих дней после осуществления.</main>
                </div>

                <AccountBalance/>
                <div class="pt-3">
                    <label for="amount">Payment amount</label>
                    <InputNumber id="amount" v-model="input.payment.amount" showButtons mode="currency" currency="BYN" />
                </div>
            </template>

            <template #footer>
                <template v-if="goto">
                    <a :href="goto" target="_blank">
                        <Button label="Оплатить счет" icon="pi pi-external-link"/>
                    </a>
                </template>

                <template v-else>
                    <Button
                        label="Создать счет"
                        icon="pi pi-plus"
                        :disabled="!input.payment.amount"
                        :loading="state.loading.pay"
                        @click="makeBill"
                    />
                </template>

            </template>
        </Card>
    </div>
</template>

<script>
import Card from 'primevue/card'
import Button from 'primevue/button'
import InputNumber from 'primevue/inputnumber'
import Dialog from 'primevue/dialog'
import AccountBalance from 'cmp/data/account/Balance'
import api from 'api'
import { PaymentInput } from 'app/entity/payment'
import { PayStructure } from 'api/structures';

export default {
    components: {
        Card,
        Button,
        AccountBalance,
        InputNumber,
        Dialog,
    },

    data() {
        return {
            input: {
                payment: PaymentInput.makeEmpty(),
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
            this.input.payment = PaymentInput.makeAccount(this.client.account);
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
            return this.$store.state.client;
        },
    },
}
</script>
