class PaymentInput {

    /**
     * @param {number} amount
     */
    constructor({amount} = {amount: 0}) {
        this.amount = amount;
    }

    /**
     * @param {ClientAccount} account
     */
    static makeAccount(account) {
        const amount =  account.negativeBalance ? account.balance * -1 : 0;
        return new PaymentInput({amount});
    }

    static makeEmpty() {
        return new PaymentInput();
    }
}

export default PaymentInput;
