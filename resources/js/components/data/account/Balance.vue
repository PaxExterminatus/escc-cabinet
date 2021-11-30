<template>
    <div class="balance-cmp">
        Баланс вашего счета <span class="balance">{{ this.user.amount }}</span> рублей
    </div>
</template>

<script>
export default {
    computed: {
        /** @returns {AuthUserData} */
        user() {
            return this.$store.state.auth.user;
        },
    },
}
</script>
