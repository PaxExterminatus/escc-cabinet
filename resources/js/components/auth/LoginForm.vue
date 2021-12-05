<template>
<div class="login-form-component">
    <h1>Вход в кабинет</h1>

    <div class="login-form">
        <div>Электронная почта</div>
        <InputText class="p-inputtext-sm" type="text" v-model="input.login"/>
        <div>Пароль</div>
        <Password class="p-inputtext-sm" v-model="input.password"/>

        <Button label="Войти" @click="login"/>
    </div>
</div>
</template>

<script>
import {authUser, CredentialsInput} from 'model'
import Button from 'primevue/button'
import Password from 'primevue/password'
import InputText from 'primevue/inputtext'

export default {
    components: {
        Button,
        Password,
        InputText,
    },

    data() {
        return {
            input: new CredentialsInput,
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
            authUser.login(this.input)
                .then(r => {
                    /** @var {LoginResponseData} response */
                    const response = r.data;
                    if (response.redirect) this.$router.push(response.redirect);
                })
        },
    },
}
</script>
