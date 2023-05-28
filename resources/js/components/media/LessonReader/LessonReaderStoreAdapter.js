class LessonReaderStoreAdapter
{
    constructor(store) {
        this.$store = store;
    }

    get display() {
        return this.$store.state.reader.show;
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
}

export default LessonReaderStoreAdapter;
