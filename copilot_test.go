package main

import "testing"

// Given an array of integers, an index, and a default value as input,
// return the element by that index;
// if no element exists with given index then return the default value.
// Index can be a negative integer, which means going over the array backwards from the end.

// Examples:
// 2  == solution([1,2,3], 1, 10)
// 10  == solution([1,2,3], 5, 10)
// 3  == solution([1,2,3], -1, 10)
// 10  == solution([1,2,3], -5, 10)
// 1  == solution([1,-5,4,2], 0, 0)
// 0  == solution([8,0,6,7], -3, -8)

func solution(arr []int, index int, defaultValue int) int {
	if index < 0 {
		index = len(arr) + index
	}
	if index >= len(arr) {
		return defaultValue
	}
	return arr[index]
}

// testSolution test solution
func TestSolution(t *testing.T) {
	var tests = []struct {
		array      []int
		index      int
		defaultVal int
		expected   int
	}{
		{[]int{1, 2, 3}, 1, 10, 2},
		{[]int{1, 2, 3}, 5, 10, 10},
		{[]int{1, 2, 3}, -1, 10, 3},
		{[]int{1, 2, 3}, -5, 10, 10},
		{[]int{1, -5, 4, 2}, 0, 0, 1},
		{[]int{8, 0, 6, 7}, -3, -8, 0},
	}
	for _, test := range tests {
		actual := solution(test.array, test.index, test.defaultVal)
		if actual != test.expected {
			t.Errorf("got %v, expected %v", actual, test.expected)
		}
	}
}
