import {ClientCourseLesson} from './ClientCourseLesson'
import {CourseCategory} from './CourseCategory'

interface ClientCourse
{
    id: number
    node_id: number
    client_id: number
    status_id: number
    name: string
    status: string
    lessons: ClientCourseLesson[]
    categories: CourseCategory[]
}

export {
    ClientCourse
}
