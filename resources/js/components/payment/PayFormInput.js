class PayFormInput {
    code = '';
    name = '';
    surname = '';
    amount = '';
    email = '';
    phone = '';

    /** @param {AuthUserData} user */
    fillFormAuthUser(user) {
        this.code = user.code;
        this.name = this.capitalize(user.iname);
        this.surname = this.capitalize(user.fname);
        this.email = user.email;
        this.phone = user.phone;
        this.amount = user.amount ? Number.parseFloat(user.amount) : 0
    }

    capitalize(s)
    {
        try {
            return s[0].toUpperCase() + s.slice(1).toLowerCase();
        } catch (e) {
            return '';
        }

    }
}

export default PayFormInput;
