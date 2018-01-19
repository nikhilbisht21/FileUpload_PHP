<?php

try{
    $name="new file";   //changes name of the file uploaded
    $target_dir="uploads/"; //directory where the files will be uploaded
    $temp=$_FILES["dcp"]["name"];
    $newname=explode(".",$temp);
    $target_file=$target_dir.$name.".".end($newname);
    $fileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $flag=1;
    
    //Check file size 
    if($_FILES["dcp"]["size"]>1024*1024*5){
        $error="File size should be less than 5 mb";
        $flag=0;
    }
    
    //Allow certain file format
    if($fileType!="txt"&&$fileType!="doc"&&$fileType!="pdf"&&$fileType!="ppt"&&$fileType!="pptx"&&$fileType!="docx"){
        $error="Only .txt,.ppt,.pdf or .doc file is allowed";
        $flag=0;
    }
    
    //Check flag
    if($flag==1){
        if(move_uploaded_file($_FILES['dcp']["tmp_name"],$target_file)){
            $error="200";
        }
        else{
            $error="Sorry, there was an error uploading your file";
        }
    }
}catch(Exception $e){
    $error="Sorry, there was an error uploading your file";
}

echo "<h1 id='h1'>$error</h1>";
?>
