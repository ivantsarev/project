
<form name="authForm" method="POST" action="<?=$_SERVER['PHP_SELF']?>">
    Число: <input type="text" name="in">
    <input type="submit">
</form>

<?php
$in=isset($_GET['in']) ? $_GET['in'];
$Mass1=array(1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610, 987, 1597, 2584, 4181, 6765, 10946);
$key = array_search($in,$Mass1);
if($key)
{
    echo  "Число совпадает с числом Фибоначчи";
}
else
{
    echo  "Число не совпадает с числом Фибоначчи";
}
?>
