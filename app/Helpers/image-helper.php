<?php 

function imageUpload($image,$directory,$imageName=null){

    if ($imageName) {
         $name = $imageName;
    }else{
        $name = $image->getClientOriginalName();
    } 
    $image->move($directory,$name);
    return $directory.$name;
    
}