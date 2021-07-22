class PayStructure {

    /**
     * @param {number} id
     * @param {number} billId
     * @param {number} billStatus
     * @param {number} amount
     */
    constructor({id, billId, billStatus, amount}) {
        this.id = id;
        this.billId = billId;
        this.billStatus = billStatus;
        this.amount = amount;
    }

    /**
     * @param {PayPaymentData} data
     */
    static makeFromResponse(data) {
        return new PayStructure({
            id: data.id,
            billId: data.bill_id,
            billStatus: data.bill_status,
            amount: data.price_total,
        });
    }

    /**
     * @returns {PayStructure}
     */
    static makeEmpty() {
        return new PayStructure({
            id: null,
            billId: null,
            billStatus: null,
            amount: null,
        });
    }
}

export {
    PayStructure,
}
