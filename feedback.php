<!DOCTYPE html>
<html>
  <head>
    <?php include 'include/meta_include.php' ?>
    <meta charset="utf-8">
    <title>Feedback</title>
    <?php include 'include/css_include.php' ?>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <?php include 'include/navbar_include.php' ?>
    <!--Modals-->
	<?php include 'include/login_modal_include.php' ?>
    <div class="container">
        <div class="card mx-5 mb-4" style="margin-top: 17vh;">
            <h2 class="card-header">Write us your Feedback</h2>
            <form class="card-body" action="feedback_form.php" method="POST">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" placeholder="name"/>
                    <label>Email</label>
                    <input class="form-control" type="text" name="email" placeholder="email"/>
                    <label>Feedback</label>
                    <textarea class="form-control" type="text" name="feedback" placeholder="Write your thoughts to us..." rows="10"></textarea>
                    <br>
                    <div class="offset-11">
                        <button class="btn btn-dark" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include 'include/footer_include.php' ?>
    <?php include 'include/js_include.php' ?>
  </body>
</html>
