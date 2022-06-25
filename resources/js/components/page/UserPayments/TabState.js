const data = () => ({
    label: '',
    loading: false,
    to: '',
    icon: '',
})

class TabState {

    constructor() {
        this.data = data();
    }

    /**
     * @param {string} label
     * @returns {TabState}
     */
    label(label)
    {
        this.data.label = label;
        return this;
    }

    /**
     * @param {string} uri
     * @returns {TabState}
     */
    to(uri)
    {
        this.data.to = uri;
        return this;
    }

    /**
     * @param {string} icons
     * @returns {TabState}
     */
    icon(icons)
    {
        this.data.icon = icons;
        return this;
    }

    get tabMenu() {
        const {label, to, icon} = this.data;

        return {
            label, to, icon,
        }
    }
}

export {
    TabState
}

export default TabState;
