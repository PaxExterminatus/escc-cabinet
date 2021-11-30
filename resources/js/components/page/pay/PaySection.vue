<template>
    <div class="page-section">
        <AppHeader/>

        <main class="content-main">
            <div class="app-container">
                <PayForm :input="payment"/>
            </div>
        </main>

        <AppFooter/>
    </div>
</template>

<script>
import { AppHeader, AppFooter } from 'cmp/page/template';
import { PayForm, PayFormInput } from "cmp/payment";

export default {
    components: {
        AppHeader,
        AppFooter,
        PayForm,
    },

    props: {
        code: {
            type: String,
            default: '',
        },
        amount: {
            type: String,
            default: 0,
        },
        name: {
            type: String,
            default: '',
        },
        surname: {
            type: String,
            default: '',
        },
        phone: {
            type: String,
            default: '',
        },
        email: {
            type: String,
            default: '',
        },
    },

    computed: {
        payment() {
            const payFormInput = new PayFormInput;

            payFormInput.fillForm({
                code: this.$route.params.code,
                amount: Number.parseFloat(this.$route.params.amount),
                name: this.name,
                surname: this.surname,
                phone: this.phone,
                email: this.email,
            });

            return payFormInput;
        }
    }

}
</script>
