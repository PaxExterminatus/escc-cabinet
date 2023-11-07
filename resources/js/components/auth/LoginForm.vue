<template>
<div class="login-form-component">
    <h1>Вход в кабинет</h1>

    <div class="login-form">
        <div>Электронная почта</div>
        <InputText class="p-inputtext-sm" type="text" v-model="input.login"/>
        <div>Пароль</div>
        <Password class="p-inputtext-sm" v-model="input.password"/>

        <Button label="Войти" :loading="loading" @click="login"/>
    </div>

    <Message v-if="error.has" :closable="false" severity="error">
        {{error.message}}
    </Message>
</div>
</template>

<script>
import {authUser, CredentialsInput} from 'model'
import Button from 'primevue/button'
import Password from 'primevue/password'
import InputText from 'primevue/inputtext'
import Message from 'primevue/message'

export default {
    components: {
        Button,
        Password,
        InputText,
        Message,
    },

    data() {
        return {
            input: new CredentialsInput,
            loading: false,
            error: {
                has: false,
                message: '',
            },
        };
    },

    computed: {
        /** @returns {AuthUser} */
        user() {
            return this.$store.state.auth.user;
        },
    },

    methods: {
        login() {
            this.loading = true;
            this.error.has = false;
            authUser.login(this.input)
                .then(r => {
                    /** @var {LoginResponseData} data */
                    const data = r.data;

                    if (data.redirect) this.$router.push(data.redirect);
                })
                .catch(error => {
                    this.error.message = error.response.data.message;
                    this.error.has = true;
                    if (error.response.status === 500)
                        this.error.message = 'Ошибка сервера, обратитесь в службу поддержки.';
                })
                .finally(data => {
                    this.loading = false;
                });
        },
    },
}
</script>
