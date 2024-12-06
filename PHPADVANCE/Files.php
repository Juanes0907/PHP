<?php 
    $file = fopen("archivo.txt","r") or die( "No se puede abrir el archivo");
    //echo fread($file,filesize("archivo.txt"));
    //fclose($file);
    //$nofile = fopen("nofile.txt","r") or die( "No existe el archivo");
    //echo fread($nofile,filesize("nofile.txt"));
    //fclose($nofile);

    echo fgets($file);
    fclose($file);
?>