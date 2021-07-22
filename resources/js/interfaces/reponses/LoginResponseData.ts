import { AuthUserData } from '../AuthUserData'
import { Response } from './Response'

export interface LoginResponse extends Response {
    data: LoginResponseData,
}

export interface LoginResponseData {
    status: string
    message: string
    redirect: string
    user: AuthUserData
}
