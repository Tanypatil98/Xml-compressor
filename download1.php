<?php
$file='';
if (isset($_REQUEST["file"])) {
 
$file = urldecode($_REQUEST["file"]);
        rename("DecompresedOutput.Xml",$file);  
    //if(preg_match("/^[^.][-a-z0-9_.]+[a-z]$/i", $file)){
        $filepath=$file;

        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            readfile($filepath);
            exit;
            header('location:index.php');
        } else {
            http_response_code(404);
            die();
        }
    /* } else {
        die("Invalid file name!");
    }*/
}
?>
