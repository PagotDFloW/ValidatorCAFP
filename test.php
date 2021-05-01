<?
echo("Oue le sang c un test d'api <br>");
echo("c en vrac mais tkt<br>");

// echo $_SERVER['HTTP_USER_AGENT'] ."<br><br>";
// $jayson = file_get_contents("https://validator.w3.org/nu/?doc=https%3A%2F%2Fwww.w3.org%2F&out=json");
// $tabJay = json_decode($jayson,TRUE);

$url = "https://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fwww.w3.org%2F&warning=0&profile=css2&output=json";

// $options = array(
//   'http'=>array(
//     'method'=>"GET",
//     'header'=>"Accept-language: en\r\n" .
//               "Cookie: foo=bar\r\n" .  // check function.stream-context-create on php.net
//               "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36\r\n" // i.e. An iPad 
//   )
// );

// $context = stream_context_create($options);
// $file = file_get_contents($url, false, $context);
// $tabJay = json_decode($file,TRUE);

// var_dump($tabJay);
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://validator.w3.org/nu/?doc=http://alptpl.alwaysdata.net/&out=json",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => '<... your html text to validate ...>',
    CURLOPT_HTTPHEADER => array(
        "User-Agent: Any User Agent",
        "Cache-Control: no-cache",
        "Content-type: text/html",
        "charset: utf-8"
    ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
   //handle error here
   die('sorry etc...');
}
$resJson = json_decode($response, true);
print_r($resJson);
echo "-----------------------------------------------------------<br>";
echo $resJson["messages"][5]["type"];

//-------------------------CSS API---------------------------------
echo"------------------------------------------------------------------------------------------------------</br>";
echo "<h2>TEST CSS API</br></h2>";
$options = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en\r\n" .
              "Cookie: foo=bar\r\n" .  // check function.stream-context-create on php.net
              "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36\r\n" // i.e. An iPad 
  )
);

$context = stream_context_create($options);
$file = file_get_contents($url, false, $context);
$tabJay = json_decode($file,TRUE);

var_dump($tabJay);

?>