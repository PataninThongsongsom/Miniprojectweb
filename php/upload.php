<?php
 include "./connect.php";
    if(isset($_FILES['file'])) {
        if(move_uploaded_file($_FILES["file"]["tmp_name"], 
                            "uploadfile/".$_POST["filename"])) {
            echo 'Upload Success';
        } else {
            echo '#Fail';
        }
    } 
?>