<?php
// Given a string, find the palindrome that can be made by inserting the fewest number of characters as possible
// anywhere in the word. If there is more than one palindrome of minimum length that can be made, return the
// lexicographically earliest one (the first one alphabetically).
//
// For example, given the string "race", you should return "ecarace", since we can add three letters to it (which is
// the smallest amount to make a palindrome). There are seven other palindromes that can be made from "race" by adding
// three letters, but "ecarace" comes first alphabetically.
//
// As another example, given the string "google", you should return "elgoogle".

/**
 * @param $str string
 * @return string
 */
function findPalindromeInsertingFewestChars($str): string
{
    $strLen = strlen($str);
    $palindromes = [];
    for ($i = 0; $i < $strLen; $i++) {
        for ($j = $i + 1; $j <= $strLen; $j++) {
            $subStr = substr($str, $i, $j);
            if (isPalindrome($subStr)) {
                $palindromes[] = $subStr;
            }
        }
    }
    sort($palindromes);
    return $palindromes[0];
}

/**
 * @param string $subStr
 * @return bool
 */
function isPalindrome(string $subStr): bool
{
    $subStrLen = strlen($subStr);
    for ($i = 0; $i < $subStrLen / 2; $i++) {
        if ($subStr[$i] != $subStr[$subStrLen - $i - 1]) {
            return false;
        }
    }
    return true;
}


// Test findPalindromeInsertingFewestChars function
assert(findPalindromeInsertingFewestChars('race') === 'ecarace');
assert(findPalindromeInsertingFewestChars('google') === 'elgoogle');
assert(findPalindromeInsertingFewestChars('lo') === 'olo');
assert(findPalindromeInsertingFewestChars('l') === 'l');
assert(findPalindromeInsertingFewestChars('olo') === 'olo');

