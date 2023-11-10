<?php

function whereArray($array, $key, $value)
{
    $hasilArray = array_values(array_filter($array, function ($item) use ($key, $value) {
        return array_key_exists($key, $item) && $item[$key] === $value;
    }));

    return $hasilArray;
}
