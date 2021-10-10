import { Response } from '../../../api/Response';
import { LoginResponseData } from './LoginResponseData';

export interface LoginResponse extends Response {
    data: LoginResponseData,
}
