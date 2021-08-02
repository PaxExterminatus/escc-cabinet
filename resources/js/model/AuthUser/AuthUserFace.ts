import { AuthUserData } from './AuthUserData';

interface AuthUserFace {

    data: AuthUserData

    fill(userData: AuthUserData)
}

export default AuthUserFace;

export {
    AuthUserFace,
}
