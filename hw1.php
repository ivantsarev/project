<?php

$fruits = array('apples' => 5, 'bananas' => 10, 'oranges' => 3);
$vegetables = array('cucumbers' => 6, 'eggplants' => 3);
$food = array($fruits, $vegetables);

// output
echo '<pre>';
print_r($food);
echo '</pre>';