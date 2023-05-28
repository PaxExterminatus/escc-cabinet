import store from 'app/store';
import LessonReader from './LessonReader';
import LessonReaderDialog from './LessonReaderDialog';
import LessonReaderStoreAdapter from './LessonReaderStoreAdapter';

const reader = new LessonReaderStoreAdapter(store);

export {
    LessonReader,
    LessonReaderDialog,
    reader,
}
