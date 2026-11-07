<?php

echo "hello world" . PHP_EOL;
$nama = "budi" . PHP_EOL;
echo $nama;

$isMarried = true;
echo $isMarried . PHP_EOL;
var_dump($isMarried);

define("APP_NAME", "HALTEV_BOOTCAMP");
echo APP_NAME;

$fruits = ["Apple", "Manggo", "Melon", "Orange"];
var_dump($fruits);
echo count($fruits) . PHP_EOL;

$person = [
    "name" => "James",
    "age" => "20",
    "addres" => [
        "city" => "Bekasi",
        "province" => "Jawa Barat",
        "country" =>"Indonesia"
    ]
];

var_dump($person);
echo $person ["name"] . PHP_EOL;
echo $person ["addres"] ["country"] . PHP_EOL;

