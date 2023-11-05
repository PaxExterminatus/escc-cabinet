class LessonReaderStoreAdapter
{
    constructor(store) {
        this.$store = store;
    }

    get display() {
        return this.$store.state.reader.show;
    }

    get title() {
        return this.$store.state.reader.title;
    }

    get src() {
        return this.$store.state.reader.src;
    }

    /** @returns {LessonReaderStoreAdapter} */
    show() {
        this.$store.commit('reader/show');
        return this;
    }

    /** @returns {LessonReaderStoreAdapter} */
    hide() {
        this.$store.commit('reader/hide');
        return this;
    }

    setTitle(title) {
        this.$store.commit('reader/setTitle', title);
        return this;
    }

    setSrc(src) {
        this.$store.commit('reader/setSrc', src);
        return this;
    }

    loading(state = true) {
        this.$store.commit('reader/loading', state);
        return this;
    }
}

export default LessonReaderStoreAdapter;
