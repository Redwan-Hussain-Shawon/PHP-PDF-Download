<?php

include_once('dompdf/autoload.inc.php');
use Dompdf\Dompdf;

// Create a Dompdf instance
$obj = new Dompdf();

// Example HTML content with inline CSS and base64 encoded images
$data = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Content</title>
    <style>
        @page {
            margin: 20px;
            border: 1px solid black;
            background-color: red; /* Ensure background-color is used */
        }
        body {
            margin: 0;
            background-color: red; /* Ensure background-color is used */
        }
        h1 {
            color: blue;
        }
        img {
            display: block;
            width: 100%; /* Set width to 100% */
            height: auto; /* Maintain aspect ratio */
        }
        .card {
            margin: 10px 0;
            padding: 10px;
            background-color: white; /* Optional: if you want a different background for the card */
        }
    </style>
</head>
<body>
    <h1>DOMPDF Redwan in PHP</h1>
    <div class="card">
        <img src="data:image/jpeg;base64,' . base64_encode(file_get_contents('https://i.ytimg.com/vi/MoCjCw8Wm8s/maxresdefault.jpg')) . '">
        <img src="data:image/webp;base64,' . base64_encode(file_get_contents('https://platinumlist.net/guide/wp-content/uploads/2023/03/IMG-worlds-of-adventure.webp')) . '">
    </div>
</body>
</html>
';

// Load HTML content into Dompdf
$obj->loadHtml($data);

// Set paper size and orientation
$obj->setPaper('A4', 'portrait');

// Render PDF (generate output)
$obj->render();

// Output the generated PDF content
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="redwan.pdf"');
echo $obj->output();

?>
