<?php
//extract the invoive xml which contains the invoice data 
$error = false;

if (isset($_GET['invoice'])) {
    $invoice = $_GET['invoice'];
    $request = "http://" . $invoice;
    $xml = simplexml_load_file($request);
    $due_Date = "due-date";
    $invoice_No = "invoice-no";
    $sub_Total = "sub-total";
    $total_Due = "total-due";
    $date = $xml->date;
    $dueDate = $xml->$due_Date;
    $invoiceNo = $xml->$invoice_No;
    $summary = $xml->summary;
    $note = $xml->notes;
    $subTotal = $xml->$sub_Total;
    $totalDue = $xml->$total_Due;
    $client = $xml->client;
    $clientId = $client->id;
    $clientName = $client->name;
}

$error = true;

//function to print the invoice body which is checked in a nested loop 
function item() {

    global $xml;

    foreach ($xml->children() as $node) {
        foreach ($node->children() as $subnode) {

            if ($subnode->id != '') {

                $discription = "name-and-description";

                echo '<div class="item">' . $subnode->id . ' ' . $subnode->$discription . '</div>
    		   	  <div class="itemdetails">' . $subnode->quantity . ' </div>
   				  <div class="itemdetails">' . $subnode->price . ' </div>
   				  <div class="itemdetails">' . $subnode->total . ' </div><br/>';
            }
        }
    }
}

?>