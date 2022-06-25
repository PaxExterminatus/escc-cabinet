<template>
    <div class="payment-history">
        <TabMenu :model="tabs" />

        <router-view/>
    </div>
</template>

<script>
import TabMenu from 'primevue/tabmenu'

export default {
    name: 'PaymentHistory',

    components: {
        TabMenu,
    },

    props: {
        userId: {
            type: Number,
            default: null,
        },
    },

    data() {
        return {
            tabs: [
                {label: 'Сайт', icon: 'pi pi-fw pi-file', to: '/payments'},
                {label: 'Все', icon: 'pi pi-fw pi-file', to: '/payments/all'},
            ],
        };
    },
}
</script>
