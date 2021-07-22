<template>
    <div class="balance-cmp">
        Your account balance <span class="balance" :class="cssBalance">{{ client.account.balance }}</span> BYN
    </div>
</template>

<script>
export default {
    computed: {
        /** @returns {ClientStore} */
        client() {
            return this.$store.state.client;
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
