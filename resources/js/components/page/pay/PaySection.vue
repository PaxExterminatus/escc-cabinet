<template>
    <div class="page-section">
        <AppHeader/>

        <main class="content-main">
            <div class="app-container">
                <PayForm :code="code" :amount="amount" :name="name" :surname="surname" :email="email" :phone="phone"/>
            </div>
        </main>

        <AppFooter/>
    </div>
</template>

<script>
import { AppHeader, AppFooter } from 'cmp/page/template';
import PayForm from 'cmp/payment/PayForm';

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
            default: '',
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
}
</script>
