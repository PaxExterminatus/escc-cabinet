import {ClientCourseLesson} from './ClientCourseLesson';

interface ClientCourse
{
    id: number
    node_id: number
    client_id: number
    status_id: number
    name: string
    status: string
    lessons: ClientCourseLesson[]
}

export {
    ClientCourse
}
