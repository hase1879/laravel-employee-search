<?php


$data = [
    ["a","b","c"],
    ["a"],
];

foreach($data as $item){
    if(strlen($item[2]) > 0 ){
        if(count($item) >= 3){
            var_dump($item);
        }
    }
}
