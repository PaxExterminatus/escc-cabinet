<template>
    <div class="page-component page-home">
        <Card>
            <template #title>
                Your Profile
            </template>

            <template #content>
                <template v-if="user">
                    Hello, {{ user.name.hello }}
                </template>
            </template>

            <template #footer>
                <Button class="p-button-sm" label="Open" @click="btnProfileOpen"/>
            </template>
        </Card>

        <Card>
            <template #title>
                Your Courses
            </template>

            <template #content>
                List of your courses
            </template>

            <template #footer>
                <Button class="p-button-sm" label="Open" @click="btnCoursesOpen"/>
            </template>
        </Card>

        <Card>
            <template #title>
                Your Payments
            </template>

            <template #content>
<!--                <AccountBalance/>-->
            </template>

            <template #footer>
                <Button class="p-button-sm" label="Open" @click="btnPaymentOpen"/>
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
            this.$router.push('payment');
        },
    },

    computed: {
        /** @returns {AuthUser} */
        user() {
            return this.$store.state.client;
        },
    },
}
</script>
