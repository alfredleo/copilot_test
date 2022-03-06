<?php
// Daily Coding Problem: Problem #1044 [Hard]

/**
 * Given a string and an array of delimiters, reverse the words in the string while maintaining the relative order of the delimiters.
 * For example:
 * given 'hello/world:here' and ['/',':'] return 'here/world:hello'
 * given 'hello-world:here' and ['-',':'] return 'here-world:hello'
 * given 'hello//world:here' and ['//',':'] return 'here//world:hello'
 * given 'hello/world//here' and ['/','//'] return 'here/world//hello'
 * given 'hello/world:here/' and ['/',':','/'] return 'here/world:hello/'
 */
function reverseWords($str, $delimiters)
{
    $pattern = '/[' . str_replace('/', '\/', implode('', $delimiters)) . ']/';
    $words = preg_split($pattern, $str);

    $reversed = array_reverse($words);

    for($i = 0; $i < count($reversed); $i++) {
        if ($i % 2 == 0) {
            $reversed[$i] = strrev($reversed[$i]);
        }
    }
    $reversedWords = array_reverse($reversed);
    $reversedStr = implode($delimiters[0], $reversedWords);
    return $reversedStr;
}

// test solution function
echo assert(reverseWords('hello/world:here', ['/', ':']) === 'here/world:hello') . PHP_EOL;


