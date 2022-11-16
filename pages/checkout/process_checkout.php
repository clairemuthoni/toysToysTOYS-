<?php
session_start();

require("..\..\middlewares\connection.php");


$sql_checkout = "UPDATE `orders` SET `order_status` = 'Paid' WHERE `order_id` =".$_SESSION["order_id"].";";
if (mysqli_query($conn, $sql_checkout)) {
  # code...
  $_SESSION['order_id'] = null;
}

header('Location: ..\homepage\home.php');
exit;

// This is for the MPESA API functionality
// if (true){
//     $ch = curl_init('https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest');
//     curl_setopt($ch, CURLOPT_HTTPHEADER, [
//     'Authorization: Bearer Pu52zrOR02btGDDpc78JAJnbLU4y',
//     'Content-Type: application/json'
//     ]);
//     curl_setopt($ch, CURLOPT_POST, 1);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, {
//         "BusinessShortCode": 174379,
//         "Password": "MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMjIxMTE2MDAzMjA1",
//         "Timestamp": "20221116003205",
//         "TransactionType": "CustomerPayBillOnline",
//         "Amount": 1,
//         "PartyA": 254708374149,
//         "PartyB": 174379,
//         "PhoneNumber": 254708374149,
//         "CallBackURL": "https://mydomain.com/path",
//         "AccountReference": "ToysInc",
//         "TransactionDesc": "Payment of X" 
//       });
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//     $response     = curl_exec($ch);
//     curl_close($ch);
//     echo $response;
// }
?>