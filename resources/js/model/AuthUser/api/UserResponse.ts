import {Response} from '../../../api/Response';
import {AuthUserData} from './AuthUserData';
import {Client} from './Client';

interface UserResponse extends Response
{
    data: UserResponseData,
}

interface UserResponseData
{
    user: AuthUserData,
    client: Client,
}

export {
    UserResponse,
    UserResponseData,
}
