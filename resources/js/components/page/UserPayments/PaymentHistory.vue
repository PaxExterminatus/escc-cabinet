<template>
    <div class="payment-history">
        <TabMenu :model="tabMenuModel" v-model:activeIndex="state.activeIndex"/>

        <RouterView v-slot="{ Component }">
            <KeepAlive>
                <Component
                    :is="Component"
                    :key="$route.fullPath"
                    :tab="state.tabs[state.activeIndex]"
                />
            </KeepAlive>
        </RouterView>

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

    data() {
        const tabs = TabStateFactory.make.router(this.$router);

        return {
            state: {
                tabs: [
                    tabs.tab({name: 'payments.site'}),
                    tabs.tab({name: 'payments.all'}),
                ],
                activeIndex: 0,
            },
        };
    },

    computed: {
        tabMenuModel() {
            return this.state.tabs.map(tab => {
                return tab.toTabMenuModel();
            })
        },
    },
}
</script>
