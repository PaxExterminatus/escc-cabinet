import TabState from 'page/UserPayments/TabState';

const data = {
    router: null,
};

class TabStateFactory {

    constructor() {
        this.data = data;
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
        this.data.router = router;
        return this;
    }


    /**
     * @param {TabStateFactoryOptions} opt
     * @returns {TabState}
     */
    tab(opt)
    {
        console.log(opt.name)
        const prop = this.data.router.resolve({
            name: opt.name,
        });

        console.log(prop.meta.label)

        const tab = new TabState();

        return tab.to(prop.href).label(prop.meta.label).icon(prop.meta.icon)
    }
}

export {
    TabStateFactory,
}

export default TabStateFactory
