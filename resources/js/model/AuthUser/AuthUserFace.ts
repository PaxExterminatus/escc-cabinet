import AuthUserModel from './AuthUserData';

export default interface AuthUserFace {

    model: AuthUserModel

    fill(userData: AuthUserModel)
}
