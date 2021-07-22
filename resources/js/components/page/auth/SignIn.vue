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

        <div>
            <button type="submit">Sign in</button>
        </div>
        <div>
            <a href="#" @click="user">User API</a>
        </div>
    </form>
</template>

<script>
import api from 'api'

export default {

    data() {
        return {
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
            api.auth.login({
                login: this.state.signin.input.login,
                password: this.state.signin.input.password,
            })
        },

        user() {
            api.auth.me();
        },
    },
}
</script>

