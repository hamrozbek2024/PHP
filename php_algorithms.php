<?php

echo "1️⃣ Eng uzun o‘suvchi ketma-ketlik (LIS)\n";
function LIS($arr) {
    $n = count($arr);
    $dp = array_fill(0, $n, 1);
    for ($i = 1; $i < $n; $i++) {
        for ($j = 0; $j < $i; $j++) {
            if ($arr[$i] > $arr[$j]) {
                $dp[$i] = max($dp[$i], $dp[$j] + 1);
            }
        }
    }
    return max($dp);
}
echo LIS([10,9,2,5,3,7,101,18]) . "\n\n";


echo "2️⃣ Eng uzun palindrom substring\n";
function longestPalindrome($s) {
    $res = "";
    $n = strlen($s);
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j <= 1; $j++) {
            $l = $i; $r = $i + $j;
            while ($l >= 0 && $r < $n && $s[$l] == $s[$r]) {
                if ($r - $l + 1 > strlen($res)) {
                    $res = substr($s, $l, $r - $l + 1);
                }
                $l--; $r++;
            }
        }
    }
    return $res;
}
echo longestPalindrome("babad") . "\n\n";


echo "3️⃣ Fibonacci (memoization)\n";
function fib($n, &$memo = []) {
    if ($n <= 1) return $n;
    if (isset($memo[$n])) return $memo[$n];
    return $memo[$n] = fib($n-1, $memo) + fib($n-2, $memo);
}
echo fib(30) . "\n\n";


echo "4️⃣ Qavslar to‘g‘ri yopilganmi\n";
function isValid($s) {
    $stack = [];
    $map = [')'=>'(',']'=>'[','}'=>'{'];
    foreach (str_split($s) as $c) {
        if (isset($map[$c])) {
            if (array_pop($stack) != $map[$c]) return false;
        } else {
            $stack[] = $c;
        }
    }
    return empty($stack);
}
var_dump(isValid("({[]})"));
echo "\n";


echo "5️⃣ Binary Search\n";
function binarySearch($arr, $target) {
    $l = 0; $r = count($arr) - 1;
    while ($l <= $r) {
        $m = intdiv($l + $r, 2);
        if ($arr[$m] == $target) return $m;
        elseif ($arr[$m] < $target) $l = $m + 1;
        else $r = $m - 1;
    }
    return -1;
}
echo binarySearch([1,3,5,7,9], 7) . "\n\n";


echo "6️⃣ Massivdan takrorlanmagan son\n";
function singleNumber($arr) {
    $res = 0;
    foreach ($arr as $n) $res ^= $n;
    return $res;
}
echo singleNumber([4,1,2,1,2]) . "\n\n";


echo "7️⃣ Stringni teskari qilish (rekursiya)\n";
function reverseStr($s) {
    if ($s === "") return "";
    return reverseStr(substr($s,1)) . $s[0];
}
echo reverseStr("PHP") . "\n\n";


echo "8️⃣ Anagram tekshirish\n";
function isAnagram($a, $b) {
    $a = str_split($a);
    $b = str_split($b);
    sort($a); sort($b);
    return $a === $b;
}
var_dump(isAnagram("listen","silent"));
echo "\n";


echo "9️⃣ Tub son tekshirish\n";
function isPrime($n) {
    if ($n < 2) return false;
    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i == 0) return false;
    }
    return true;
}
var_dump(isPrime(29));
echo "\n";


echo "🔟 Faktorial (rekursiya)\n";
function factorial($n) {
    return $n <= 1 ? 1 : $n * factorial($n-1);
}
echo factorial(6) . "\n";

?>
