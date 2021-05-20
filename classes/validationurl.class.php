<?php

require_once("./classes/Services_WTF.class.php");


class ValidationUrl {
    private $url;

    public function __construct($URL){
        $this->url = $URL;
    }


    public function getUrl(){
        return $this->url;
    }

    public function GetHtmlErrors()
    {
        $options = array(
            'http'=>array(
              'method'=>"GET",
              'header'=>"Accept-language: en\r\n" .
                        "Cookie: foo=bar\r\n" .  // check function.stream-context-create on php.net
                        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36\r\n" // i.e. An iPad 
            )
          );
        $context = stream_context_create($options);

        $htmlUrl = "https://validator.w3.org/nu/?doc=".$this->url."&out=json";
        $W3C = file_get_contents($htmlUrl,false,$context);
        $resJson = json_decode($W3C,TRUE);

        return $resJson;
    }

    public function GetCssErrors()
    {
        $options = array(
            'http'=>array(
              'method'=>"GET",
              'header'=>"Accept-language: en\r\n" .
                        "Cookie: foo=bar\r\n" .  // check function.stream-context-create on php.net
                        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36\r\n" // i.e. An iPad 
            )
        );
        $context = stream_context_create($options);

        $url = "https://jigsaw.w3.org/css-validator/validator?uri=".$this->url."&profile=css3&output=json";
        $file = file_get_contents($url, false, $context);
        $tabJay = json_decode($file,TRUE);

        return $tabJay;

    }

    public function getPerf()
    {
        $test = new Services_WTF_Test("dyckeuss@outlook.fr", "f590c8ccdc7a0b44eb9f90f854b7c7e2");
        $url_to_test = $this->url;
        $testid = $test->test(array(
            'url' => $url_to_test
        ));

        if (!$testid) {
            die("Test failed: " . $test->error() . "<br>");
        }
        

        $test->get_results();
        


        if ($test->error()) {
            die($test->error());
        }
        $testid = $test->get_test_id();
        echo "<div class='row row-cols-1 row-cols-md-4 g-4'>";
        $results = $test->results();
        foreach ($results as $result => $data) {

            if($result=="report_url"){
                $report_url = $data;
                continue;
            }
            else{
                echo "<div class='parent'>
                            <label>$result</label>
                        <div class='b'>$data</div>
                        </div>";
            }

            
            
        }
        echo "</div>";
        
        echo "<a href='",$report_url,"pdf' class='btn btn-success btn-lg' tabindex='-1' role='button' aria-disabled='true'>Rapport de performance (PDF)</a>";

    }


    


}











?>