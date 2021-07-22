<template>
    <div class="page-section">
        <AppHeader>
            <TabMenu :model="headerMenu" />
            <template #right>
                <Button
                    class="p-button-rounded p-button-info p-button-outlined"
                    icon="pi pi-user"
                    aria-haspopup="true"
                    aria-controls="overlay_tmenu"
                    @click="toggle"
                />
                <TieredMenu
                    id="overlay_tmenu"
                    ref="menu"
                    :model="userMenu"
                    :popup="true"
                />
            </template>
        </AppHeader>

        <main class="content-main">
            <router-view/>
        </main>

        <footer>
            footer
        </footer>
    </div>
</template>

<script>
import api from 'api'
import Button from 'primevue/button'
import TabMenu from 'primevue/tabmenu'
import TieredMenu from 'primevue/tieredmenu'
import AppHeader from 'cmp/page/template/AppHeader'
import { memberHeaderMenu, memberUserMenu } from 'app/menus'

export default {
    components: {
        AppHeader,
        TabMenu,
        TieredMenu,
        Button,
    },

    data() {
        return {
            userMenu: memberUserMenu,
            headerMenu: memberHeaderMenu,
        };
    },

    mounted() {
        this.clientGet();
    },

    computed: {
        /** @returns {AuthUser} */
        user() {
            return this.$store.state.auth.user;
        }
    },

    methods: {
        toggle(event) {
            this.$refs.menu.toggle(event);
        },

        clientGet() {
            api.auth.user().then(clientData => {
                this.user.fill(clientData);
            });
        },
    },
}
</script>
