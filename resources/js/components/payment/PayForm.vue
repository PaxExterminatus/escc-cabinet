<template>
    <div class="pay-form">

        <Toast />

        <div class="pay-title-small">webpay</div>

        <h1 class="pay-title">Платеж</h1>

        <span class="p-float-label">
            <InputText id="code" type="text" v-model="input.code" :class="{'p-invalid': codeLabel.error}"/>
            <label for="code">
                {{ codeLabel.label }}
                <span style="color: red">*</span>
            </label>
        </span>

        <div class="p-inputgroup">
            <span class="p-float-label">
                <InputText id="name" v-model="input.name"/>
                <label for="name">Имя</label>
            </span>
        </div>

        <div class="p-inputgroup">
            <span class="p-float-label">
                <InputText id="surname" v-model="input.surname"/>
                <label for="surname">Фамилия</label>
            </span>
        </div>

        <span class="p-float-label">
            <InputNumber id="amount" v-model="input.amount" mode="currency" currency="BYN" :class="{'p-invalid': amountLabel.error}"/>
            <label for="amount">
                {{ amountLabel.label }}
                <span style="color: red">*</span>
            </label>
        </span>

        <div class="p-inputgroup">
            <span class="p-float-label">
                <InputText id="email" type="text" v-model="input.email" :class="{'p-invalid': emailLabel.error}"/>
                <label for="email">
                    {{ emailLabel.label }}
                    <span style="color: red">*</span>
                </label>
                <Button icon="pi pi-question-circle" v-tooltip.left="'На ваш электронный будет отправлен чек'"/>
            </span>
        </div>

        <div class="p-inputgroup">
            <span class="p-float-label">
                <InputMask id="phone" v-model="input.phone" mask="+375 (99) 999-99-99"/>
                <label for="phone">Мобильный телефон</label>
                <Button icon="pi pi-question-circle" v-tooltip.left="'На ваш номер будет отправлено уведомление о завершении платежа'"/>
            </span>
        </div>

        <div class="pay-actions">
            <Button label="Оплатить" :icon="payBtnIcon" @click="pay"/>
        </div>
    </div>
</template>

<script>
import InputText from 'primevue/inputtext'
import InputNumber from 'primevue/inputnumber'
import InputMask from 'primevue/inputmask'
import Button from 'primevue/button'
import Tooltip from 'primevue/tooltip'
import { payment } from 'api'

export default {
    components: {
        Button,
        InputText,
        InputMask,
        InputNumber,
    },

    props: {
        code: {
            type: String,
            default: '',
        },
        amount: {
            type: String,
            default: '',
        },
        name: {
            type: String,
            default: '',
        },
        surname: {
            type: String,
            default: '',
        },
        phone: {
            type: String,
            default: '',
        },
        email: {
            type: String,
            default: '',
        },
    },

    directives: {
        'tooltip': Tooltip
    },

    data() {
        return {
            input: {
                code: this.code,
                amount: this.amount ? Number.parseFloat(this.amount) : 0,
                email: this.email,
                phone: this.phone,
                name: this.capitalize(this.name),
                surname: this.capitalize(this.surname),
            },

            state: {
                loading: {
                    pay: false,
                },

                errors: {},
            },
        };
    },

    computed: {
        payBtnIcon() {
            return this.state.loading.pay ? 'pi pi-spin pi-spinner' : 'pi pi-external-link';
        },
        codeLabel() {
            let error = false;
            let label = 'Код клиента';

            try {
                label = this.state.errors.code[0];
                error = true;
            } catch (e) {}

            return {
                error,
                label,
            }
        },

        emailLabel() {
            let error = false;
            let label = 'Электронная почта';

            try {
                label = this.state.errors.email[0];
                error = true;
            } catch (e) {}

            return {
                error,
                label,
            }
        },

        amountLabel() {
            let error = false;
            let label = 'Сумма';

            try {
                label = this.state.errors.amount[0];
                error = true;
            } catch (e) {}

            return {
                error,
                label,
            }
        },
    },

    methods: {
        capitalize(s)
        {
            try {
                return s[0].toUpperCase() + s.slice(1).toLowerCase();
            } catch (e) {
                return '';
            }

        },

        pay() {
            this.state.errors = {};
            this.state.loading.pay = true;
            payment.pay({
                amount: this.input.amount,
                code: this.input.code,
                email: this.input.email,
                phone: this.input.phone.replace(/\D/g,''),
                name: this.input.name,
                surname: this.input.surname,
            }).then(response => {
                if (response.goto) {
                    location.replace(response.goto);
                }
            }).catch(error => {
                if (error.response.status === 422) {
                    this.$toast.add({
                        severity:'error',
                        summary: 'Ошибка при создании платежа',
                        detail:'Отправленные вами данные содержат ошибку или неполны',
                        life: 10000,
                    });

                    this.state.errors = error.response.data.errors;
                } else {
                    this.$toast.add({
                        severity:'error',
                        summary: error.response.data.message,
                        life: 10000,
                    });
                }
            }).finally(() => {
                this.state.loading.pay = false;
            });
        },
    },
}
</script>
