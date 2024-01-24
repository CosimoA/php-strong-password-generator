<?php
function generatePassword($length, $useNumbers = true, $useLetters = true, $useSymbols = true, $avoidRepetitions = false)
{
    $characters = '';
    $password = '';

    if ($useNumbers) {
        $characters .= '0123456789';
    }

    if ($useLetters) {
        $characters .= 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }

    if ($useSymbols) {
        $characters .= '!@#$%^&*()-_+=';
    }

    $charactersArray = str_split($characters);

    for ($i = 0; $i < $length; $i++) {
        $randomCharacter = $charactersArray[array_rand($charactersArray)];

        if ($avoidRepetitions && strpos($password, $randomCharacter) !== false) {
            $i--; // Ripeti l'iterazione se si verifica una ripetizione
        } else {
            $password .= $randomCharacter;
        }
    }

    return $password;
}
