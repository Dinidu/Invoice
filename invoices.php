<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>invoice</title>
        <link rel="stylesheet" type="text/css" href="style.css" />

    </head>

    <body bgcolor="#333333">

        <div id="head"></div>
        <div id="main">
            <div id="invoice">


                <?php
// getting the curdbee id and token              
                if (isset($_POST['submit'])) {
                    $id = $_POST['id'];
                    $token = $_POST['token'];
//load the xml which contain the invoices according to the id and the token.
					$urlrequest = "http://" . $id . ".curdbee.com/invoices.xml?api_token=" . $token;
                    $xml = simplexml_load_file($urlrequest);
                    $num = "0";
                    foreach ($xml->invoice as $value) {
                        $num++;
                        $FindId{$num} = $value->id;
                        $Findclient{$num} = $value->client->name;
                    }

// a display for the results
                    echo "Found ", $num, " Possable Invoice Data Sets <br>";
                    $CountNumResults = "0";
                    for (; $num > 0; $num--) {
                        $CountNumResults++;
                        $inurl = $id . ".curdbee.com/invoices/" . $FindId{$num} . ".xml?api_token=" . $token;
                        $url = "http://localhost/curdbee/invoice.php?invoice=" . $inurl;
                        echo "<br> ID =<a href=" . $url . "> " . $FindId{$num} . "</a><br> client = " . $Findclient{$num} . "<br>";
                    }
                    echo "END";
                }
                ?>
            </div>
        </div>

        <div id="foot"></div>

    </body>
</html>