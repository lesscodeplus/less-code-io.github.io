import {passwordValidator} from './PasswordValidator'

export const requiredProp = (message="required") => { return { required: true, message, trigger:'blur'}};
export const emailProp = () => { 
    return { 
        type: 'email', 
        message :'Please enter a valid email address', 
        trigger:'blur'
    }
};
export const passwordProp = () => { return { validator: passwordValidator, trigger: 'blur' }};
