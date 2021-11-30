import { AuthUserData } from './AuthUserData'

export interface LoginResponseData {
    status: string
    message: string
    redirect: string
    user: AuthUserData
}