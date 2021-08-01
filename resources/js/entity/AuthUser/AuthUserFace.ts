import AuthUserModel from './AuthUserModel';

export default interface AuthUserFace {

    model: AuthUserModel

    fill(userData: AuthUserModel)
}
