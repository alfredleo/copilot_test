<?php
// Daily Coding Problem: Problem #1044 [Hard]

/**
 * Given a string, reverse the words in the string while maintaining the relative order of the delimiters.
 * For example:
 * given 'hello/world:here' return 'here/world:hello'
 * given 'hello-world:here' return 'here-world:hello'
 * given 'hello//world:here' return 'here//world:hello'
 * given 'hello/world//here' return 'here/world//hello'
 * given 'hello/world:here/' return 'here/world:hello/'
 * 1) use stack to store words
 * 2) use queue to store delimiters
 */

/**
 * @param string $str
 * @return string
 */
function reverseWords($str): string
{
    $stack = new SplStack();
    $queue = new SplQueue();
    $string = str_split($str);
    $word = '';
    foreach ($string as $char) {
        if ($char === '/' || $char === '-' || $char === ':') {
            $queue->enqueue($char);
        } else {
            $word .= $char;
        }
        if ($char === '/' || $char === '-' || $char === ':') {
            $stack->push($word);
            $word = '';
        }
    }
    $stack->push($word);
    $word = '';
    while (!$stack->isEmpty()) {
        $word .= $stack->pop();
        if (!$queue->isEmpty()) {
            $word .= $queue->dequeue();
        }
    }
    echo $str . PHP_EOL;
    echo $word;
    return $word;
}

// test solution function
echo assert(reverseWords('hello/world:here') === 'here/world:hello') . PHP_EOL;
echo assert(reverseWords('hello-world:here') === 'here-world:hello') . PHP_EOL;
echo assert(reverseWords('hello//world:here') === 'here//world:hello') . PHP_EOL;
echo assert(reverseWords('hello/world//here') === 'here/world//hello') . PHP_EOL;
echo assert(reverseWords('hello/world:here/') === 'here/world:hello/') . PHP_EOL;
echo assert(reverseWords('hello/world:here//') === 'here/world:hello//') . PHP_EOL;
echo assert(reverseWords('hello/world:here/:') === 'here/world:hello/:') . PHP_EOL;


