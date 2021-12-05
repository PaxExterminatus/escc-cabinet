import {ClientCourse} from './ClientCourse';

interface ClientData
{
    id: number
    name: string
    middle_name: string
    last_name: string
    total_deb: number
    courses: ClientCourse[]
}

export {
    ClientData
}
