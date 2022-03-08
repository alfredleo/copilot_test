<?php
// Client has a multi-language e-store. That, at the moment, sells mice and glasses (but it’s going to expand soon).
// But there is a problem, when you add more than 1 item to the cart, the name of the product doesn’t change (so, for
// example, it says “8 mouse”, instead of “8 mice”).
//
//Client wants us to fix it.
//
//You need to write a function (just a function, there is no need to write a working app or anything), that would accept
// some parameters and return formatted string, that would need to be output to the user.
//
//So, something like:
//
//function(…)
//{
//  …
//
//  return …; // 8 mice
//}
//
//To simplify the task, let’s say that the absolute maximum amount of the same things in the cart is 10.
//
//P.S. Since some people do not know that: there are languages, that have more than two forms of a word, not just
// singular and multiple. Besides, developers are not linguists, and shouldn’t assume they are.

function format_cart_item_name($name, $count)
{
    if ($count > 1) {
        $name .= 's';
    }
    return $name;
}

// test for format_cart_item_name
echo format_cart_item_name('mouse', 1) . PHP_EOL; // mouse
echo format_cart_item_name('mouse', 2) . PHP_EOL; // mouses
echo format_cart_item_name('mouse', 10) . PHP_EOL; // mouses
echo format_cart_item_name('glass', 1) . PHP_EOL; // glasses
echo format_cart_item_name('glass', 2) . PHP_EOL; // glasses
echo format_cart_item_name('glass', 10) . PHP_EOL; // glasses
