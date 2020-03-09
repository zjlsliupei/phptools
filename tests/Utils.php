<?php
include '../vendor/autoload.php';
$data = [
    [
        "id"=>1,
        "pid"=>0
    ],
    [
        "id"=>2,
        "pid"=>1
    ],
    [
        "id"=>3,
        "pid"=>2
    ],
    [
        "id"=>4,
        "pid"=>0
    ],
    [
        "id"=>5,
        "pid"=>0
    ],
];


print_r(liupei\phptools\Utils::generateTree($data));