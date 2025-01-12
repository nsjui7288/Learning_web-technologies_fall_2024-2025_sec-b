function isValidName(name) {
    if (name.length < 4 || name==="") {
        return false;
    } else {
        const allowedCharacters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_.';
        for (let i = 0; i < name.length; i++) {
            const character = name[i];
            if (allowedCharacters.indexOf(character) === -1) {
                return false;
            }
        }
        return true;
    }
}

function isValidUsername(username) {
    const allowedCharacters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_';

    if (username.length < 4 || username==="") return false;

    for (let i = 0; i < username.length; i++) {
        const character = username[i];

        if (allowedCharacters.indexOf(character) === -1) {
            return false;
        }
    }

    return true;
}

function isValidEmail(email) {
    const atIndex = email.indexOf('@');
    const dotIndex = email.lastIndexOf('.');

    if (atIndex === -1 || dotIndex === -1 || email==="") {
        return false;
    }
    if (atIndex === 0 || dotIndex === email.length - 1 || email==="") {
        return false;
    }

    if (email.indexOf('..') !== -1 || email==="") {
        return false;
    }

    if (email.indexOf('.@') !== -1 || email==="") {
        return false;
    }

    if (email.indexOf('@.') !== -1 || email==="") {
        return false;
    }
    if (email.indexOf('.com') === -1 || email==="") {
        return false;
    }

    if (email.indexOf(' ') !== -1 || email==="") {
        return false;
    }

    return true;
}

function isValidPhone(phone) {
    if (phone.length !== 11 || phone==="") return false;
    const allowedCharacters = '0123456789';

    for (let i = 0; i < phone.length; i++) {
        const character = phone[i];

        if (allowedCharacters.indexOf(character) === -1) {
            return false;
        }
    }

    return true;
}

function isValidPassword(password) {
    if (password.length < 8 || password==="") {
        return false;
    } else {
        const allowedCharactersSpecial = '.,!@#$%^&*|:;';
        const allowedCharactersCapitalLetter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        const allowedCharactersSmallLetter = 'abcdefghijklmnopqrstuvwxyz';
        const allowedCharactersNumber = '0123456789';
        let countSpCharacter = 0;
        let countCapLetter = 0;
        let countSmLetter = 0;
        let countNumber = 0;
        for (let i = 0; i < password.length; i++) {
            const character = password[i];
            if (allowedCharactersSpecial.indexOf(character) !== -1) {
                countSpCharacter = 1;
            }
            if (allowedCharactersCapitalLetter.indexOf(character) !== -1) {
                countCapLetter = 1;
            }
            if (allowedCharactersSmallLetter.indexOf(character) !== -1) {
                countSmLetter = 1;
            }
            if (allowedCharactersNumber.indexOf(character) !== -1) {
                countNumber = 1;
            }
        }
        if (countSpCharacter === 0 || countCapLetter === 0 || countSmLetter === 0 || countNumber === 0) {
            return false;
        }
        return true;
    }
}

function isValidConfirmPassword(password, confirmPassword) {
    if (password === confirmPassword || confirmPassword==="") {
        return true;
    }
    return false;
}

function isValidAddress(address) {
    if (address.length < 5 || address==="") {
        return false;
    }
    return true;
}

function isValidFile(type, size) {
    if(size<=0){
        return false;
    }
    const lowerCaseType = type.toLowerCase();
    const periodPosition = lowerCaseType.indexOf('.');
    const actualType = lowerCaseType.substring(periodPosition + 1);
    const validType = ['jpg', 'jpeg', 'png'];
    for (let i = 0; i < validType.length; i++) {
        if (actualType === validType[i] && size <= 10000000) {
            return true;
        }
    }
    return false;
}