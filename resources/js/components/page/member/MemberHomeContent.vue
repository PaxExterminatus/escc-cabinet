<template>
    <div class="page-component page-home">
        <Card>
            <template #title>
                Ващ профиль
            </template>

            <template #content v-if="user.fname">
                Привет, {{ user.fname }}
            </template>

            <template #footer>
                <Button class="p-button-sm" label="Открыть" @click="btnProfileOpen"/>
            </template>
        </Card>

        <Card>
            <template #title>
                Ваши курсы
            </template>

            <template #content>
                Список ваших курсов
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
                <AccountBalance/>
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
        /** @returns {AuthUserData} */
        user() {
            return this.$store.state.auth.user;
        },
    },
}
</script>
