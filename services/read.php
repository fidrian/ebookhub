<?php 

// The location of the PDF file 
// on the server 
$name= $_GET['nama'];
$filename = __DIR__ . "/../file_buku/".$name;

// Header content type 
header("Content-type: application/pdf"); 

header("Content-Length: " . filesize($filename)); 

// Send the file to the browser. 
readfile($filename); 
?> 
