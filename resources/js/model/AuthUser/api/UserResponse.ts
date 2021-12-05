import {Response} from '../../../api/Response';
import {UserData} from './UserData';
import {ClientData} from './ClientData';

interface UserResponse extends Response
{
    data: UserResponseData,
}

interface UserResponseData
{
    user: UserData,
    client: ClientData,
}

export {
    UserResponse,
    UserResponseData,
}
