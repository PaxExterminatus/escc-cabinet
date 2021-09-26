<template>
    <div class="balance-cmp">
        Баланс вашего счета <span class="balance" :class="cssBalance">{{ this.client.account.balance }}</span> рублей
    </div>
</template>

<script>
export default {
    computed: {
        /** @returns {AuthUserStore} */
        client() {
            return this.$store.state.auth.user;
        },

        cssBalance() {
            return {
                negative: this.client.account.negativeBalance,
                positive: this.client.account.positiveBalance,
            };
        },
    },
}
</script>
