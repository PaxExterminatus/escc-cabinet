import { AuthUserModel } from '../structure/AuthUserData'

export interface LoginResponseData {
    status: string
    message: string
    redirect: string
    user: AuthUserModel
}
