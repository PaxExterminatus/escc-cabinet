<template>
    <div class="page-section">
        <AppHeader>
            <TabMenu :model="menu" />
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
import Button from 'primevue/button'
import TabMenu from 'primevue/tabmenu'
import TieredMenu from 'primevue/tieredmenu'
import AppHeader from 'cmp/page/template/AppHeader'
import api from 'api';
import { memberHeaderMenu } from 'app/menus'

export default {
    components: {
        AppHeader,
        TabMenu,
        TieredMenu,
        Button,
    },

    data() {
        return {
            menu: memberHeaderMenu,
            userMenu: [
                {
                    label:'Выйти',
                    icon:'pi pi-fw pi-power-off',
                    command: () => {
                        api.auth.logout();
                    },
                }
            ],
        };
    },

    mounted() {
        this.clientGet();
    },

    methods: {
        toggle(event) {
            this.$refs.menu.toggle(event);
        },

        clientGet() {
            api.user.me().then(clientData => {
                this.$store.state.client.fill(clientData);
            });
        },
    },
}
</script>
