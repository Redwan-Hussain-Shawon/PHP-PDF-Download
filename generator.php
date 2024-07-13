<?php 

include_once('dompdf/autoload.inc.php');
use Dompdf\Dompdf;

$obj=new Dompdf();

// Add your custom CSS for margins
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
            height:200px
           
        }
    </style>
</head>
<body>
    <h1>DOMPDF Tutorial in PHP</h1>
        <img src="https://i.ytimg.com/vi/MoCjCw8Wm8s/maxresdefault.jpg">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRN1MxQpdnaeXnxFs5jCVLMh1XOkC5ZHuksBw&s" \>
</body>
</html>
';


//$data='<h1 style="color:blue">DOMPDF Tutorial in PHP</h1>';

$obj->loadHTML($data);
$obj->set_option('isRemoteEnabled',true);
$obj->setPaper('A4','Portrait');

$obj->render();

//$obj->stream('dompdf',array('Attachment'=>0));

file_put_contents('sample1.pdf',$obj->output());
// show pdf in web page
$obj->stream('dompdf',array('Attachment'=>0));


// Direct Download
// $obj->stream('sample1.pdf', array('Attachment' => 1));
// header('location:index.php')

?>