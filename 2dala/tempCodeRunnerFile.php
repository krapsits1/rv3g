<?php

$masivs1 = array();
for($i=0; $i<100; $i++){
    $masivs1[$i] = rand(1,1000);
}   

$n = count($masivs1);
echo $n;

function bubble_sort($masivs1){