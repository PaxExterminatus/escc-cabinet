<template>
    <div class="page-component page-profile">
        <template v-if="user">
            <h2>Профиль пользователя сайта</h2>

            <div class="pay-form">
            <span class="p-float-label">
                <InputText v-model="user.iname"/>
                <label>Имя</label>
            </span>

                <span class="p-float-label">
                <InputText v-model="user.fname"/>
                <label>Фамилия</label>
            </span>

                <span class="p-float-label">
                <InputText v-model="user.code"/>
                <label>Студенческий номер</label>
            </span>

                <span class="p-float-label">
                <InputText type="text" v-model="user.email"/>
                <label> Электронная почта</label>
            </span>

                <span class="p-float-label">
                <InputMask v-model="user.phone" mask="+375 (99) 999-99-99"/>
                <label>Мобильный телефон</label>
            </span>
            </div>
        </template>

        <template v-if="client">
            <h2>Профиль студента</h2>
            <div class="pay-form">
            <span class="p-float-label">
                <InputText v-model="client.name"/>
                <label>Имя</label>
            </span>

                <span class="p-float-label">
                <InputText v-model="client.middle_name"/>
                <label>Отчетво</label>
            </span>

                <span class="p-float-label">
                <InputText v-model="client.last_name"/>
                <label>Фамилия</label>
            </span>

                <span class="p-float-label">
                <InputText v-model="client.id"/>
                <label>Студенческий номер</label>
            </span>
            </div>
        </template>
    </div>
</template>

<script>
import InputText from 'primevue/inputtext'
import InputMask from 'primevue/inputmask'

export default {
    components: {
        InputText,
        InputMask,
    },
    computed: {
        /** @returns {UserData} */
        user() {
            return this.$store.state.auth.user;
        },

        /** @returns {ClientData} */
        client() {
            return this.$store.state.auth.client;
        },
    },
}
</script>
