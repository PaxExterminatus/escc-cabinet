import {APIResponse} from '../../../../contracts/APIResponse';
import {UserData} from './UserData';
import {ClientData} from './ClientData';

interface UserResponse extends APIResponse
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
