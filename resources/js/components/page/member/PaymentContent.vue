<template>
    <div class="page-component page-payment">
        <h2>Новый платеж</h2>
        <div class="app-container">
            <PayForm :input="input.payment"/>
        </div>
        <h2>История операций</h2>
    </div>
</template>

<script>
import Card from 'primevue/card'
import Button from 'primevue/button'
import InputNumber from 'primevue/inputnumber'
import Dialog from 'primevue/dialog'
import AccountBalance from 'cmp/data/account/Balance'
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
        };
    },

    watch: {
        client: {
            immediate: true,
            handler () {
                this.input.payment.fillFormAuthUser(this.$store.state.auth.client, this.$store.state.auth.user);
            },
        },
    },

    computed: {
        /** @returns {ClientData} */
        client() {
            return this.$store.state.auth.client;
        },
        /** @returns {UserData} */
        user() {
            return this.$store.state.auth.user;
        },
    },
}
</script>
