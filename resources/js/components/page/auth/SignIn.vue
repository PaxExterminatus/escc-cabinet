<template>
    <form action="#" @submit.prevent="submit">
        <div>
            <label for="email">Email address</label>
            <input v-model="state.signin.input.login" type="text" name="email" id="email">
        </div>

        <div>
            <label for="password">Password</label>
            <input v-model="state.signin.input.password" type="text" name="password" id="password">
        </div>

        <button type="submit">Sign in</button>
    </form>
</template>

<script>
import AppClient from 'api/AppClient'

export default {

    data() {
        return {
            client: AppClient.make(),
            state: {
                signin: {
                    input: {
                        login: '',
                        password: '',
                    },
                },
            },
        };
    },

    methods: {
        submit() {
            this.client.signIn({
                login: this.state.signin.input.login,
                password: this.state.signin.input.password,
            })
        },
    },
}
</script>

