class RespondedElement {
    constructor() {
        this.keeped = null;
        this.state = null;
    }

    keepState() {
        this.keeped = {
            ...this.state,
        };
    }

    restoreState() {
        this.state = {
            ...this.keeped,
        };
    }

    /**
     * @param {function} fn
     * @returns {RespondedElement}
     */
    wait(fn = null)
    {
        this.keepState();
        if (fn) fn();
        return this;
    }

    /**
     * @param {function} fn
     * @returns {RespondedElement}
     */
    ready(fn = null)
    {
        this.restoreState();
        if (fn) fn();
        return this;
    }
}

export {
    RespondedElement,
}

export default RespondedElement
