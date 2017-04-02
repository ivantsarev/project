<?php
function factorial ($n)
{
    if ($n==1)
        return 1;
    else {
        return $n*factorial($n-1);

    }


}
echo factorial(5);
die();

function hextobin2 ($hex)

{
    $param=
        array(
            '0'=>'0000',
            '1'=>'0001',
            '2'=>'0010',
            '3'=>'0011',
            '4'=>'0100',
            '5'=>'0101',
            '6'=>'0110',
            '7'=>'0111',
            '8'=>'1000',
            '9'=>'1001',
            'A'=>'1010',
            'B'=>'1011',
            'C'=>'1100',
            'D'=>'1101',
            'E'=>'1110',
            'F'=>'1111',
        );
    $hexarray =str_split($hex);
    $retarr=array();

    foreach ($hexarray as $value){
        $retarr[] = $param{$value};

    }

    return implode(' ', $retarr);
}

echo hextobin2('1D2F');

die();



















function hextobin ($hex)

{
    $param=
    array(
        '0'=>'0000',
        '1'=>'0001',
        '2'=>'0010',
        '3'=>'0011',
        '4'=>'0100',
        '5'=>'0101',
        '6'=>'0110',
        '7'=>'0111',
        '8'=>'1000',
        '9'=>'1001',
        'A'=>'1010',
        'B'=>'1011',
        'C'=>'1100',
        'D'=>'1101',
        'E'=>'1110',
        'F'=>'1111',
        );
$hexarray =str_split($hex);
$retstr='';
foreach ($hexarray as $value){
    $retstr.= $param{$value}. ' ' ;

}
return $retstr;
}

echo hextobin('1D2F');
/*5
8 4 2 1
0 1 0 1*/

die();
function kub ($param,$level=3 )
{
    return pow($param,$level);

}
echo kub(3);

function datetostring($date, $month, $year)
{
    if ($month<10) $month='0' . $month;
    return $year . '-'. $month . '-'. $date;


}
echo datetostring(26,03,2017);

function getdatename ($daynum)
{
    $dayarray =
        array(1 => 'mond',
            2 => "thu");
    if (!array_key_exists($daynum,$dayarray))
    {
        return "wrong param";
    }
    return $dayarray[$daynum];
}

echo getdatename(2);

