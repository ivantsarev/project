<?php
$a = array (array (1, 2, 3, 6, 8, 9),
     array (5, 1, 8, 0, 3, 7),
     array (4, 7, 3, 3, 1, 5)
);

echo "\$arr = array (<br />
    array (1, 2, 3, 6, 8, 9),<br />
    array (5, 1, 8, 0, 3, 7),<br />
    array (4, 7, 3, 3, 1, 5);<br />
)";

array_unshift ($a, null);
$a = call_user_func_array("array_map", $a);
echo "<pre>";
print_r($a);
echo "</pre>";
?>
