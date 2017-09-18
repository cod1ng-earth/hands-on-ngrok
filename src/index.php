<html>
<head>
    <title>CodingBerlin Hands-on Meetup - ngrok Demo</title>
</head>
<body>

    <h1>ngrok Demo</h1>

<?php

    echo 'Test';
//    echo $_SERVER['']
    echo GetClientMac();

function GetClientMac(){
    $macAddr=false;
    $arp=`arp -n`;
    $lines=explode("\n", $arp);
    var_dump($arp);

    foreach($lines as $line){
        $cols=preg_split('/\s+/', trim($line));

        if ($cols[0]==$_SERVER['REMOTE_ADDR']){
            $macAddr=$cols[2];
        }
    }

    return $macAddr;
}

?>

</body>
</html>
