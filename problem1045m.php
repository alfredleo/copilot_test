<?php

// Problem #1045 [Medium]
// This problem was asked by Microsoft.
// Describe and give an example of each of the following types of polymorphism:

// 1. Ad-hoc polymorphism (not available in PHP, example of possible polyfill https://github.com/garex/php-ad-hoc-polymorphism-polyfill)
// 2. Parametric polymorphism
// 3. Subtype polymorphism

// Solutions by Copilot:

// 1. ad-hoc polymorphism is when you have a function that takes a parameter, and then you can use
// that parameter to call a different function based on the value of that parameter.

// 1. Ad-hoc Polymorphism in PHP (googling and personal research):
// Ad-hoc polymorphism allows a polymorphic value to exhibit different behaviors when viewed at
// different types. The most common example of this is method overloading when we create different
// implementations that share the same method name within the same class. The only difference
// between these methods is in its arguments, they should be of different types. Then the compiler
// at a runtime chooses the appropriate implementation based on the type of the passed arguments.
// But sadly in PHP, we don’t have such a feature. Our interpreter will simply die as soon as it
// finds a class with to or more identically named methods.


// 2. parametric polymorphism is when you have a function that takes a parameter, and then you can use
// that parameter to call a different function based on the type of that parameter.

// 2. Parametric Polymorphism in PHP (googling and personal research):
// Unlike ad-hoc polymorphism, this type of polymorphism PHP supports out of the box, because of the
// loosely typed nature of the language. When we have no type hints, we can pass into function/method
// anything we want:
// function sum($a, $b){
//     return $a + $b;
// }
// echo sum((int)2, (int)3); // 5
// echo sum((float)1.6, (float)2.12); // 3.72
// echo sum('abc', 4); // 4

// The difference with ad-hoc polymorphism is that parametric polymorphism means that we don’t care
// about the type, we implement the function the same for any. Ad-hoc polymorphism instead means that
// we have a different implementation depending on the type of the argument. Now let’s refresh the
// example with Cache from subtype polymorphism:



// 3. subtype polymorphism is when you have a function that takes a parameter, and then you can use that
// parameter to call a different function based on the type of that parameter.
// For example, if you have a function that takes a string, and then you can use that string to call
// a different function based on the string.

// 3. Subtype Polymorphism In PHP (googling and personal research):
// This is the most commonly known type of polymorphism. In OOP terms it means that when we have
// methods in different classes that do similar things, we should give these methods the same name.
// These classes shouldn’t even belong to a one base type. We ensure that all our classes have the
// same interface: they all have the same methods that take the same arguments. Why is it important?
// What does it give to us? When our interface is implemented, we don’t need to care about how these
// classes work. According to their common interface, we know their methods, their behavior, so we
// exactly know how to work with all of them. There is no more reason to consider every single class
// separately, instead, we consider all of them as a whole.