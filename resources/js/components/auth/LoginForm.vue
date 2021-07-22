<template>
<div class="login-form-component">
    <h1>Sign in to ESCC</h1>

    <div class="login-form">
        <div>Email address </div>
        <InputText class="p-inputtext-sm" type="text" v-model="input.login"/>
        <div>Password</div>
        <Password class="p-inputtext-sm" v-model="input.password"/>

        <Button label="Login" @click="login"/>
    </div>
</div>
</template>

<script>
import api from 'api'
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
            input: {
                login: '',
                password: '',
            }
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
            api.auth.login({
                login: this.state.signin.input.login,
                password: this.state.signin.input.password,
            }).then(r => {
                this.user.fill(r.data.user);
            })
        },
    },
}
</script>
