import { UserData } from './UserData'

export interface LoginResponseData {
    status: string
    message: string
    redirect: string
    user: UserData
}
