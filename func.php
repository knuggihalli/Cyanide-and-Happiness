<?php

function rcg(){
	$url = "http://www.samair.ru/proxy/socks01.htm";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);

    $start = strpos($output, 'SOCKS4');
    $end = explode('<td>' , $output);

   	$name = $output[2];
   	return $end;
   	
}



function rcgp($name){
	$url = "http://explosm.net/rcg/".$name;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);

    $start = strpos($output, '<img id="rcg-comic" src=');
    $end = strpos($output, '</div>', $start);
    $length = $end-$start;
    $output = substr($output, $start, $length);
   
   	return $output;
}

function sfadf(){
    $length = $end-$start;
    $output = substr($output, $start, $length);
    $output = str_replace(' ', " ", $output);
    $output = explode('/',$output);
}
?>