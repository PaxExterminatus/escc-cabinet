<template>
    <div class="page-component page-home">
        <Card>
            <template #title>
                Ващ профиль
            </template>

            <template #content v-if="auth.loaded">
                Привет, {{ auth.user.fname || auth.client.name }}
            </template>

            <template #footer>
                <Button class="p-button-sm" label="Открыть" @click="btnProfileOpen"/>
            </template>
        </Card>

        <Card>
            <template #title>
                Ваши курсы.
            </template>

            <template #content>
                <span v-if="auth.loaded">
                    Увас {{ auth.client.courses.length }} курсов.
                </span>
            </template>

            <template #footer>
                <Button class="p-button-sm" label="Открыть" @click="btnCoursesOpen"/>
            </template>
        </Card>

        <Card>
            <template #title>
                Ваши платежи
            </template>

            <template #content>
                <span v-if="auth.loaded">
                    Баланс вашего счета <AccountBalance/> рублей
                </span>
            </template>

            <template #footer>
                <Button class="p-button-sm" label="Открыть" @click="btnPaymentOpen"/>
            </template>
        </Card>
    </div>
</template>

<script>

import Card from 'primevue/card'
import Button from 'primevue/button'
import AccountBalance from 'cmp/data/account/Balance'

export default {
    components: {
        Card,
        Button,
        AccountBalance,
    },

    methods: {
        btnCoursesOpen() {
            this.$router.push('courses');
        },

        btnProfileOpen() {
            this.$router.push('profile');
        },

        btnPaymentOpen() {
            this.$router.push('payments');
        },
    },

    computed: {
        /** @returns {AuthState} */
        auth() {
            return this.$store.state.auth;
        },
    },
}
</script>
