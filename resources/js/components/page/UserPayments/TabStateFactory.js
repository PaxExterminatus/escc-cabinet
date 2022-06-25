import TabState from 'page/UserPayments/TabState';

const state = () => ({
    router: null,
});

class TabStateFactory {

    constructor() {
        this.state = state();
    }

    static get make()
    {
        return new TabStateFactory;
    }

    /**
     *
     * @param router Vue router
     * @returns {TabStateFactory}
     */
    router(router)
    {
        this.state.router = router;
        return this;
    }


    /**
     * @param {TabStateFactoryOptions} opt
     * @returns {TabState}
     */
    tab(opt)
    {
        const prop = this.state.router.resolve({
            name: opt.name,
        });

        const tab = new TabState();

        return tab.to(prop.href).label(prop.meta.label).icon(prop.meta.icon)
    }
}

export {
    TabStateFactory,
}

export default TabStateFactory
