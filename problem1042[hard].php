<?php

// Write a program that computes the length of the longest common subsequence of three given strings.
// For example, given "epidemiologist", "refrigeration", and "supercalifragilisticexpialodocious",
// it should return 5, since the longest common subsequence is "eieio".

function lcs1($a, $b, $c)
{
    $lcs = [];
    for ($i = 0; $i < strlen($a); $i++) {
        for ($j = 0; $j < strlen($b); $j++) {
            for ($k = 0; $k < strlen($c); $k++) {
                if ($a[$i] == $b[$j] && $b[$j] == $c[$k]) {
                    $lcs[$i] = $a[$i];
                }
            }
        }
    }
    return count($lcs);
}


function lcs2($a, $b, $c)
{
    $lcs = 0;
    $len1 = strlen($a);
    $len2 = strlen($b);
    $len3 = strlen($c);

    for ($i = 0; $i < $len1; $i++) {
        for ($j = 0; $j < $len2; $j++) {
            for ($k = 0; $k < $len3; $k++) {
                if ($a[$i] === $b[$j] && $b[$j] === $c[$k]) {
                    $lcs++;
                }
            }
        }
    }

    return $lcs;
}

function lcs3($a, $b, $c)
{
    $lcs = [];
    $lcs[0][0] = 0;
    for ($i = 1; $i <= strlen($a); $i++) {
        $lcs[$i][0] = 0;
    }
    for ($j = 1; $j <= strlen($b); $j++) {
        $lcs[0][$j] = 0;
    }
    for ($i = 1; $i <= strlen($a); $i++) {
        for ($j = 1; $j <= strlen($b); $j++) {
            if ($a[$i - 1] == $b[$j - 1]) {
                $lcs[$i][$j] = $lcs[$i - 1][$j - 1] + 1;
            } else {
                $lcs[$i][$j] = max($lcs[$i - 1][$j], $lcs[$i][$j - 1]);
            }
        }
    }
    return $lcs[strlen($a)][strlen($b)];
}

function lcs4($s1, $s2, $s3)
{
    $lcs = array();

    for ($i = 0; $i < strlen($s1); $i++) {
        for ($j = 0; $j < strlen($s2); $j++) {
            for ($k = 0; $k < strlen($s3); $k++) {
                if ($s1[$i] == $s2[$j] && $s2[$j] == $s3[$k]) {
                    $lcs[$i][$j][$k] = 1;
                }
            }
        }
    }

    $max = 0;

    for ($i = 0; $i < strlen($s1); $i++) {
        for ($j = 0; $j < strlen($s2); $j++) {
            for ($k = 0; $k < strlen($s3); $k++) {
                if ($lcs[$i][$j][$k] == 1) {
                    $max = max($max, $i + $j + $k + 1);
                }
            }
        }
    }

    return $max;
}

function lcs5($a, $b, $c)
{
    $d = array(array(array()));
    for ($i = 0; $i < strlen($a); $i++) {
        for ($j = 0; $j < strlen($b); $j++) {
            for ($k = 0; $k < strlen($c); $k++) {
                if ($a[$i] == $b[$j] && $b[$j] == $c[$k]) {
                    $d[$i][$j][$k] = 1;
                } else {
                    $d[$i][$j][$k] = 0;
                }
            }
        }
    }
    $max = 0;
    for ($i = 0; $i < strlen($a); $i++) {
        for ($j = 0; $j < strlen($b); $j++) {
            for ($k = 0; $k < strlen($c); $k++) {
                if ($d[$i][$j][$k] == 1) {
                    $max = max($max, $i + 1);
                }
            }
        }
    }
    return $max;
}

function lcs6($str1, $str2, $str3)
{
    $len1 = strlen($str1);
    $len2 = strlen($str2);
    $len3 = strlen($str3);

    $dp = array_fill(0, $len1 + 1, array_fill(0, $len2 + 1, array_fill(0, $len3 + 1, 0)));

    for ($i = 1; $i <= $len1; $i++) {
        for ($j = 1; $j <= $len2; $j++) {
            for ($k = 1; $k <= $len3; $k++) {
                if ($str1[$i - 1] == $str2[$j - 1] && $str2[$j - 1] == $str3[$k - 1]) {
                    $dp[$i][$j][$k] = $dp[$i - 1][$j - 1][$k - 1] + 1;
                } else {
                    $dp[$i][$j][$k] = max($dp[$i - 1][$j][$k], $dp[$i][$j - 1][$k], $dp[$i][$j][$k - 1]);
                }
            }
        }
    }

    return $dp[$len1][$len2][$len3];
}

function lcs7($str1, $str2, $str3)
{
    $len1 = strlen($str1);
    $len2 = strlen($str2);
    $len3 = strlen($str3);

    $lcs_table = array();

    for ($i = 0; $i <= $len1; $i++) {
        for ($j = 0; $j <= $len2; $j++) {
            for ($k = 0; $k <= $len3; $k++) {
                if ($i == 0 || $j == 0 || $k == 0) {
                    $lcs_table[$i][$j][$k] = 0;
                } else {
                    $lcs_table[$i][$j][$k] = 0;
                    if ($str1[$i - 1] == $str2[$j - 1] && $str2[$j - 1] == $str3[$k - 1]) {
                        $lcs_table[$i][$j][$k] = $lcs_table[$i - 1][$j - 1][$k - 1] + 1;
                    } else {
                        $lcs_table[$i][$j][$k] = max($lcs_table[$i - 1][$j][$k], $lcs_table[$i][$j - 1][$k], $lcs_table[$i][$j][$k - 1]);
                    }
                }
            }
        }
    }

    return $lcs_table[$len1][$len2][$len3];
}


function lcs8($a, $b, $c)
{
    $lcs = 0;
    $a = str_split($a);
    $b = str_split($b);
    $c = str_split($c);
    $l = count($a);
    $m = count($b);
    $n = count($c);
    $dp = array_fill(0, $l + 1, array_fill(0, $m + 1, array_fill(0, $n + 1, 0)));
    for ($i = 0; $i <= $l; $i++) {
        for ($j = 0; $j <= $m; $j++) {
            for ($k = 0; $k <= $n; $k++) {
                if ($i == 0 || $j == 0 || $k == 0) {
                    $dp[$i][$j][$k] = 0;
                } elseif ($a[$i - 1] == $b[$j - 1] && $b[$j - 1] == $c[$k - 1]) {
                    $dp[$i][$j][$k] = $dp[$i - 1][$j - 1][$k - 1] + 1;
                } else {
                    $dp[$i][$j][$k] = max($dp[$i - 1][$j][$k], $dp[$i][$j - 1][$k], $dp[$i][$j][$k - 1]);
                }
                if ($dp[$i][$j][$k] > $lcs) {
                    $lcs = $dp[$i][$j][$k];
                }
            }
        }
    }
    return $lcs;
}

function lcs9($a, $b, $c)
{
    $a = str_split($a);
    $b = str_split($b);
    $c = str_split($c);

    $len_a = count($a);
    $len_b = count($b);
    $len_c = count($c);

    $lcs_table = [];

    for ($i = 0; $i < $len_a; $i++) {
        for ($j = 0; $j < $len_b; $j++) {
            for ($k = 0; $k < $len_c; $k++) {
                if ($a[$i] === $b[$j] && $b[$j] === $c[$k]) {
                    $lcs_table[$i][$j][$k] = 1;
                } else {
                    $lcs_table[$i][$j][$k] = 0;
                }
            }
        }
    }

    $result = 0;
    for ($i = 0; $i < $len_a; $i++) {
        for ($j = 0; $j < $len_b; $j++) {
            for ($k = 0; $k < $len_c; $k++) {
                if ($lcs_table[$i][$j][$k] === 1) {
                    $lcs_table[$i][$j][$k] =
                        $lcs_table[$i - 1][$j - 1][$k - 1] + 1;
                    if ($lcs_table[$i][$j][$k] > $result) {
                        $result = $lcs_table[$i][$j][$k];
                    }
                }
            }
        }
    }

    return $result;
}

function lcs10($str1, $str2, $str3)
{
    $lcs = [];
    for ($i = 0; $i < strlen($str1); $i++) {
        for ($j = 0; $j < strlen($str2); $j++) {
            for ($k = 0; $k < strlen($str3); $k++) {
                $lcs[$i][$j][$k] = 0;
            }
        }
    }
    for ($i = 0; $i < strlen($str1); $i++) {
        for ($j = 0; $j < strlen($str2); $j++) {
            if ($str1[$i] == $str2[$j]) {
                $lcs[$i][$j][0] = 1;
            }
        }
    }
    for ($j = 0; $j < strlen($str2); $j++) {
        for ($k = 0; $k < strlen($str3); $k++) {
            if ($str2[$j] == $str3[$k]) {
                $lcs[0][$j][$k] = 1;
            }
        }
    }
    for ($i = 1; $i < strlen($str1); $i++) {
        for ($j = 1; $j < strlen($str2); $j++) {
            for ($k = 1; $k < strlen($str3); $k++) {
                if ($lcs[$i - 1][$j][$k] == 1) {
                    $lcs[$i][$j][$k] = 1;
                }
                if ($lcs[$i][$j - 1][$k] == 1) {
                    $lcs[$i][$j][$k] = 1;
                }
                if ($lcs[$i][$j][$k - 1] == 1) {
                    $lcs[$i][$j][$k] = 1;
                }
                if ($lcs[$i - 1][$j - 1][$k] == 1) {
                    $lcs[$i][$j][$k] = 1;
                }
                if ($lcs[$i - 1][$j][$k - 1] == 1) {
                    $lcs[$i][$j][$k] = 1;
                }
                if ($lcs[$i][$j - 1][$k - 1] == 1) {
                    $lcs[$i][$j][$k] = 1;
                }
                if ($lcs[$i - 1][$j - 1][$k - 1] == 1) {
                    $lcs[$i][$j][$k] = 1;
                }

            }
        }
    }
    $max = 0;
    for ($i = 0; $i < strlen($str1); $i++) {
        for ($j = 0; $j < strlen($str2); $j++) {
            for ($k = 0; $k < strlen($str3); $k++) {
                if ($lcs[$i][$j][$k] == 1) {
                    $max = max($max, $i + $j + $k + 1);
                }
            }
        }
    }
    return $max;
}


// test lcs function
// 4 of 10 gave correct result on first test
$a = "epidemiologist";
$b = "refrigeration";
$c = "supercalifragilisticexpialodocious";
echo lcs1($a, $b, $c) . PHP_EOL; // 9
echo lcs2($a, $b, $c) . PHP_EOL; // 52
echo lcs3($a, $b, $c) . PHP_EOL; // 5
echo @lcs4($a, $b, $c) . PHP_EOL; // 52 with notices
echo lcs5($a, $b, $c) . PHP_EOL; // 14
echo lcs6($a, $b, $c) . PHP_EOL; // 5
echo lcs7($a, $b, $c) . PHP_EOL; // 5
echo lcs8($a, $b, $c) . PHP_EOL; // 5
echo @lcs9($a, $b, $c) . PHP_EOL; // 2 with notices
echo lcs10($a, $b, $c) . PHP_EOL; // 59


