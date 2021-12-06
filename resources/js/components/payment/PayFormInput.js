class PayFormInput {
    code = '';
    name = '';
    surname = '';
    amount = 0;
    email = '';
    phone = '';

    /**
     * @param {ClientData} client
     * @param {UserData} user
     * */
    fillFormAuthUser(client, user) {
        this.code = user.code;
        this.name = this.capitalize(client.name);
        this.surname = this.capitalize(client.last_name);
        this.email = user.email;
        this.phone = user.phone;
        if (client.total_deb && client.total_deb < 0) {
            this.amount = client.total_deb;
        }
    }

    fillForm({code, name, surname, email, phone, amount}) {
        this.code = code || '';
        this.name = name || '';
        this.surname = surname || '';
        this.email = email || '';
        this.phone = phone || '';
        this.amount = Number.parseFloat(amount) || 0;
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
