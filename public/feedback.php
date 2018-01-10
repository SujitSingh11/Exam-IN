<!DOCTYPE html>
<html>
  <head>
    <?php include '../include/meta_include.php' ?>
    <meta charset="utf-8">
    <title>Contact Us</title>
    <?php include '../include/css_include.php' ?>
  </head>
  <body>
    <div class="container m-5">
      <h2>Feedback</h2>
      <form action="" method="">
        <div class="form-group">
          <label>Name</label>
          <input class="form-control" type="text" name="name" placeholder="name"/>
          <label>Email</label>
          <input class="form-control" type="text" name="email" placeholder="email"/>
          <label>Feedback</label>
          <textarea class="form-control" type="text" name="feedback" placeholder="Write your thoughts to us..." rows="10"></textarea>
          <br>
          <button class="btn btn-dark" type="submit">Submit</button>
        </div>    
      </form>
    </div>
    <?php include '../include/js_include.php' ?>
  </body>
</html>
