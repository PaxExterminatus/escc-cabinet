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
                    this.$router.push({name: 'home'});
                })
        },
    },
}
</script>
