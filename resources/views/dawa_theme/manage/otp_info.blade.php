<?php


$url = "https://api.itelservices.net/balance.php?user=minhaj&pass=SS123";
    // Make a POST request
    $options = stream_context_create(['http' => [
            'method'  => 'GET',
            'header'  => 'Content-type: application/json',
        ]
    ]);
    // Send a request
    $result = file_get_contents($url, false, $options);
    if($result == "No Record Found")
    {
        $balence = "No Record Found";
$balenceint = "No Record Found";
$sms = "No Record Found" ;

    }
    else {
        $balence = trim(explode(":",$result)[1]);
$balenceint = str_replace(",","", $balence);
$sms = (int)((Double)$balenceint / 0.35)  ;

    }



        ?>
        <b>@lang('Remaining Balence: Rs:')</b><u>{{$balence}}</u>   <br>
        <b>@lang('Remaining SMS:')</b> {{$sms}}
