<?php
$fruits = array('apples' => 5, 'bananas' => 10, 'oranges' => 3);
print_r($fruits);

// we have 10 bananas
echo "We have ";
echo $fruits['bananas'];
echo " bananas";

// changing element of array
$fruits['apples'] = 12;

$arr = array('test', 'test 2', 'some_key' => 'hello');
print_r($arr);
