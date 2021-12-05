import {ClientCourse} from './ClientCourse';

interface Client
{
    id: number
    name: string
    middle_name: string
    last_name: string
    total_deb: number
    courses: ClientCourse[]
}

export {
    Client
}
