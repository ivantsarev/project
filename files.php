<?php

function writetofile ($text)
{
    $file=fopen('str.txt','a+');
 fwrite($file, base64_encode($text));
        fclose($file);

}

function readfromfile ()
{
    $file=fopen('str.txt','r');
    $content='';
    while (!feof ($file))
    {
        $content.= fread($file,1024);
    }
    fclose($file);
    return base64_decode($content);
}


writetofile('sgchgqh');
echo readfromfile();



die();
$date=date('d-m-Y');
echo  explode('-',$date)[2];


die();

$date=date('d-m-Y');
list($d,$m,$y)=explode('-',$date);
echo $date,$d,$m,$y;