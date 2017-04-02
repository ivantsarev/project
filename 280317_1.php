<?php

function massive (){
    for ($i=0; $i <10000;$i++) {

        yield $i;
    }

}

foreach (massive() as $item){

}

