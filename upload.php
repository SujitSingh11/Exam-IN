<?php
    $cropped_image = $_FILES['croppedImage'];
    $upload_to = $cropped_image['tmp_name'];
    $new_file = 'CP1-img.jpg';

    move_uploaded_file($upload_to,$new_file);
?>
