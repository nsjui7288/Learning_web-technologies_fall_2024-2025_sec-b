
<?php
function isValidName($name){
if(strlen($name)<4){
    return false;
}
else{
    $allowedCharacters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_.';
    for($i=0;$i<strlen($name);$i++){
        $character=$name[$i];
        if(strpos($allowedCharacters,$character)===false ){
            return false;
        }
    }
    return true;
}
}
function isValidUsername($username)
{
    $allowedCharacters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_';

    if(strlen($username) < 4) return false;

    for ($i = 0; $i < strlen($username); $i++) {
        $character = $username[$i];

        if (strpos($allowedCharacters, $character) === false) {
            return false;
        }
    }

    return true;
}
function isValidEmail($email)
{
    $atIndex = strpos($email, '@');
    $dotIndex = strrpos($email, '.');

    if ($atIndex === false || $dotIndex === false) {
        return false;
    }
    if ($atIndex === 0 || $dotIndex === (strlen($email) - 1)) {
        return false;
    }

    if (strpos($email, '..') !== false) {
        return false;
    }

    if (strpos($email, '.@') !== false) {
        return false;
    }

    if (strpos($email, '@.') !== false) {
        return false;
    }
    if (strpos($email, '.com') == false) {
        return false;
    }

    if (strpos($email, ' ') !== false) {
        return false;
    }

    return true;
}
function isValidPhone($phone){
if(strlen($phone)!=11) return false;
$allowedCharacters = '0123456789';

for ($i = 0; $i < strlen($phone); $i++) {
    $character = $phone[$i];

    if (strpos($allowedCharacters, $character) === false) {
        return false;
    }
}

return true;
}

function isValidPassword($password) {
    if (strlen($password) < 8) {
        return false;
    } else {
        $allowedCharactersSpecial = '.,!@#$%^&*|:;';
        $allowedCharactersCapitalLetter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $allowedCharactersSmallLetter = 'abcdefghijklmnopqrstuvwxyz';
        $allowedCharactersNumber = '0123456789';
        $countSpCharacter = 0;
        $countCapLetter = 0;
        $countSmLetter = 0;
        $countNumber = 0;
        for ($i = 0; $i < strlen($password); $i++) {
            $character = $password[$i];
            if (strpos($allowedCharactersSpecial, $character) !== false) {
                $countSpCharacter = 1;
            }
            if (strpos($allowedCharactersCapitalLetter, $character) !== false) {
                $countCapLetter = 1;
            }
            if (strpos($allowedCharactersSmallLetter, $character) !== false) {
                $countSmLetter = 1;
            }
            if (strpos($allowedCharactersNumber, $character) !== false) {
                $countNumber = 1;
            }
        }
        if ($countSpCharacter === 0 || $countCapLetter === 0 || $countSmLetter === 0 || $countNumber === 0) {
            return false;
        }
        return true;
    }
}
function isValidConfirmPassword($password,$confirmPassword){
    if($password===$confirmPassword){
        return true;
    }
    return false;
}
function isValidAddress($address){
    if(strlen($address)<5){
        return false;
    }
    return true;
}
function isValidFile($type,$size){
    $lowerCaseType=strtolower($type);
    $periodPosition=strpos($lowerCaseType,'.');
    $actualType=substr($lowerCaseType,$periodPosition+1);
    $validType=array('jpg','jpeg','png');
    for($i=0;$i<count($validType);$i++){
        if($actualType===$validType[$i] && $size<=10000000){
            return true;
        }
       
    }
    return false;
}
?>
