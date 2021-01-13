<?php

function craft_bomb()
{
    $array = [1, [2, 3]];
    $array[1][1] = &$array;
    return $array;
}

$bomb = craft_bomb();
$local = [1, [2, 3]];
$local[1][1] = &$local;
var_dump($bomb);
var_dump($local);
