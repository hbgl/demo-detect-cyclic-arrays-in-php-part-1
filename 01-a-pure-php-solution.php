<?php

function is_cyclic(array &$array)
{
    $lastKey = array_key_last($array);
    if ($lastKey === null) {
        // Array is empty
        return false;
    }
    static $marker;
    if ($marker === null) {
        $marker = new stdClass();
    }
    if ($array[$lastKey] === $marker) {
        return true;
    }
    $array[] = $marker;
    foreach ($array as &$item) {
        if (is_array($item) && is_cyclic($item)) {
            array_pop($array);
            return true;
        }
    }
    array_pop($array);
    return false;
}

// Contains reference to itself
$v = [1, 2, 3];
$v[1] = &$v;

// Contains nested array with reference to $x
$x = [1, [2, 3]];
$x[1][1] = &$x;

// Contains nested array with reference to an ancestor
$y = [1, [2, [3, 4]]];
$y[1][1][1] = &$y[1];

// Nested array contains reference to itself
$z = [1, [2, 3]];
$z[1][1] = &$z[1];

// This array is not recursive
$p = [1, 2, [3, 4, [5, 6, 7]]];


foreach (['v', 'x', 'y', 'z', 'p'] as $var) {
    $arr = &${$var};
    echo "Array \$$var | Cyclic: ";
    var_export(is_cyclic($arr));
    echo "\n";
    echo "----------------\n";
    var_dump($arr);
    echo "\n\n";
}
