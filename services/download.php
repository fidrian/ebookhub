<?php
$name= $_GET['id'];
$filedir = __DIR__ . "/../file_buku/".$name;
if (file_exists($filedir))
{
    header('Content-Description: File Transfer');
    header('Content-Type: application/force-download');
    header("Content-Disposition: attachment; filename=\"" . basename($filedir) . "\";");
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filedir));
    ob_clean();
    flush();
    readfile($filedir); //showing the path to the server where the file is to be download
    exit;
}else{
    echo  "<script type='text/javascript'>alert('Download Gagal');</script>";
}
?>