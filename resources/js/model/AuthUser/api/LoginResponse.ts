import { APIResponse } from '../../../../contracts/APIResponse';
import { LoginResponseData } from './LoginResponseData';

export interface LoginResponse extends APIResponse {
    data: LoginResponseData,
}
