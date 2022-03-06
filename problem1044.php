<?php
// Daily Coding Problem: Problem #1044 [Hard]

/**
 * Given a string and a set of delimiters, reverse the words in the string while maintaining the relative order of the delimiters.
 * For example, given "hello/world:here", return "here/world:hello"
 * Follow-up: Does your solution work for the following cases: "hello/world:here/", "hello//world:here"
 */
function solution(string $s, array $delimiters)
{
    $delimiters = array_unique($delimiters);
    $delimiters = array_map(function ($delimiter) {
        return preg_quote($delimiter, '/');
    }, $delimiters);
    $delimiters = implode('|', $delimiters);
    $delimiters = '/' . $delimiters . '/';
    $s = preg_replace_callback($delimiters, function ($matches) {
        return implode('/', array_reverse(explode('/', $matches[0])));
    }, $s);
    return $s;
}

// test solution function
$s = 'hello/world:here';
$delimiters = ['/', ':'];
echo solution($s, $delimiters);
echo PHP_EOL;
