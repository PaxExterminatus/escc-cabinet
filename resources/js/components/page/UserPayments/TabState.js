import RespondedElement from './RespondedElement'

const state = () => ({
    label: '',
    to: '',
    icon: '',
})

class TabState extends RespondedElement {

    constructor() {
        super();
        this.state = state();
    }

    /**
     * @param {string} label
     * @returns {TabState}
     */
    label(label)
    {
        this.state.label = label;
        return this;
    }

    /**
     * @param {string} uri
     * @returns {TabState}
     */
    to(uri)
    {
        this.state.to = uri;
        return this;
    }

    /**
     * @param {string} icons
     * @returns {TabState}
     */
    icon(icons)
    {
        this.state.icon = icons;
        return this;
    }

    get tabMenu() {
        const {label, to, icon} = this.state;

        return {
            label, to, icon,
        }
    }

    wait() {
        return super.wait(() => {
            this.state.icon = 'pi pi-spin pi-spinner';
        });
    }
}

export {
    TabState
}

export default TabState;
