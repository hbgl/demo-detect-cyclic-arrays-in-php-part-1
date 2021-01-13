<?php

$i = 0;

function is_cyclic(array &$array)
{
    global $i;
    
    // Exit when too deep.
    if (++$i > 10) {
        exit;
    }
    
    echo "Iteration $i:\n";
    echo "Memory usage: " . memory_get_usage() . "\n";
    echo "\n";
    
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

function craft_bomb()
{
    $array = [range(1, 1000), [range(1, 512), 3]];
    $array[1][1] = &$array;
    return $array;
}

$bomb = craft_bomb();
is_cyclic($bomb);
