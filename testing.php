<?php
    include 'db/database.php';
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include 'include/meta_include.php' ?>
        <meta charset="utf-8">
        <title>Testing</title>
        <?php include 'include/css_include.php' ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/3.1.4/cropper.min.css">

        <style media="screen">
            .img-box img{
                max-width: 100%;
                max-height: 600px;
            }
            .cropper-crop {
                background: none;
            }
            .cropper-bg {
                background: none;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="img-box">
                <img id="image" src="2.jpg">
                <button class="btn" name="button" onclick="crop()">Crop</button>
            </div>
        </div>
        <?php include 'include/js_include.php' ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/3.1.4/cropper.min.js"></script>
        <script>

            $("#image").cropper();
            function crop(){

                $("#image").cropper('getCroppedCanvas').toBlob(function (blob) {
                  var formData = new FormData();

                  formData.append('croppedImage', blob);

                  $.ajax('upload.php', {
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function () {
                      console.log('Upload success');
                    },
                    error: function () {
                      console.log('Upload error');
                    }
                  });
                });
            }
        </script>
    </body>
</html>
