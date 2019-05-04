<?php
function sort_array($array)
{
    asort($array);
    foreach ($array as $x => $x_value) {
        sort($x_value);
        $array[$x] = $x_value;
    }
    print_r($array);
}
$datalain = [
    ['g','h','i','j'],
    ['a','c','b','e','d'],
    ['g','e','f']
];

sort_array($datalain);