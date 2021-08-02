import { Response } from './Response';
import { LoginResponseData } from './LoginResponseData';

export interface LoginResponse extends Response {
    data: LoginResponseData,
}
