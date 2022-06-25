<template>
    <div class="payment-history">
        <TabMenu :model="tabMenuModel" />

        <router-view/>
    </div>
</template>

<script>
import TabMenu from 'primevue/tabmenu'
import TabStateFactory from './TabStateFactory';

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
        const tabs = TabStateFactory.make.router(this.$router);

        return {
            state: {
                tabs: {
                    all: tabs.tab({name: 'payments.all'}),
                    site: tabs.tab({name: 'payments.site'}),
                },
            },
        };
    },


    computed: {
        tabMenuModel() {
            return [
                this.state.tabs.site.tabMenu,
                this.state.tabs.all.tabMenu,
            ];
        },
    },
}
</script>
