<?php


function createdFolderCategory()
{
    $dir = 'upload/category/';
    $dir_final = public_path($dir);
    
    if (!file_exists($dir_final)) {
       mkdir($dir_final, 0777, true);
    }

    $folder = date("Y");
    if (!file_exists($dir_final.$folder)) {
       mkdir($dir_final.$folder, 0777, true);
    }
    $folder .= "/".date("m");
    if (!file_exists($dir_final.$folder)) {
       mkdir($dir_final.$folder, 0777, true);
    }
    return array("dir_final"=>$dir_final, "folder"=>$folder);
}

function createdFolderItem()
{
    $dir = 'upload/item/';
    $dir_final = public_path($dir);
    
    if (!file_exists($dir_final)) {
       mkdir($dir_final, 0777, true);
    }

    $folder = date("Y");
    if (!file_exists($dir_final.$folder)) {
       mkdir($dir_final.$folder, 0777, true);
    }
    $folder .= "/".date("m");
    if (!file_exists($dir_final.$folder)) {
       mkdir($dir_final.$folder, 0777, true);
    }
    return array("dir_final"=>$dir_final, "folder"=>$folder);
}

?>