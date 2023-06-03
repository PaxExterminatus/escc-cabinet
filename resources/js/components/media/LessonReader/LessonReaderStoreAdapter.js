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
}

export default LessonReaderStoreAdapter;
