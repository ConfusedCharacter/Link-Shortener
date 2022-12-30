<?php

/**
 * t.ly WebService
 * By Confused Character
 * github https://github.com/ConfusedCharacter/
 * 
 */

function Tly($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://www.shorturl.at/shortener.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
        'Content-Type: application/x-www-form-urlencoded',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.5359.125 Safari/537.36',
        'origin: https://www.shorturl.at',
        'referer: https://www.shorturl.at/',
        'Accept-Language: en-US,en;q=0.9'
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS,"u=".$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close ($ch);
    $response = explode('"',explode('id="shortenurl" type="text" value="',$response)[1])[0];
    return $response;
}


echo Tly("https://google.com");