<?php
$name= $_GET['id'];
$filedir = __DIR__ . "/../file_buku/".$name;
if (file_exists($filedir))
{
    header("Content-type: application/pdf");  
    header('Content-Disposition: inline; filename="' . $name . '"');
    header("Content-Length: " . filesize($filedir));  
    readfile($filedir); //Send the file to the browser
}else{
    echo  "<script type='text/javascript'>alert('Preview Gagal');</script>";
}
?>