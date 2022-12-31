<?php
//error_reporting(1);
/**
 * t.ly WebService
 * By Confused Character
 * github https://github.com/ConfusedCharacter/
 *
 */

function Tly($url){
    $data = '------WebKitFormBoundaryjryi4xgstszZtKzQ
Content-Disposition: form-data; name="url"

'.$url.'
------WebKitFormBoundaryjryi4xgstszZtKzQ
Content-Disposition: form-data; name="domain"

0
------WebKitFormBoundaryjryi4xgstszZtKzQ--';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://cutt.ly/scripts/shortenUrl.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Accept: */*',
        'Content-Type: multipart/form-data; boundary=----WebKitFormBoundaryjryi4xgstszZtKzQ',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',
        'origin: https://cutt.ly',
        'referer: https://cutt.ly/',
        'Accept-Language: en-US,en;q=0.9'
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close ($ch);
    return $response;
}
echo '<html><head><meta name="color-scheme" content="light dark"></head><body><pre style="word-wrap: break-word; white-space: pre-wrap;">'.Tly($_GET['u']).'</pre></body></html>';
