import store from 'app/store';
import LessonReader from './LessonViewFrame.vue';
import LessonReaderDialog from './LessonReaderDialog';
import LessonReaderStoreAdapter from './LessonReaderStoreAdapter';

const reader = new LessonReaderStoreAdapter(store);

export {
    LessonReader,
    LessonReaderDialog,
    reader,
}
