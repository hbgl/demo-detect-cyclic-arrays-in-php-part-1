<?php

function is_cyclic(array &$array, int $maxDepth = -1)
{
    if ($maxDepth === 0) {
        throw new Exception('Maximum nesting level exceeded.');
    }
    
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
        if (is_array($item) && is_cyclic($item, $maxDepth - 1)) {
            array_pop($array);
            return true;
        }
    }
    array_pop($array);
    return false;
}

function craft_bomb()
{
    $array = [1, [2, 3]];
    $array[1][1] = &$array;
    return $array;
}

$bomb = craft_bomb();
var_export(is_cyclic($bomb, 10));
