<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form action="generate.php" method="post">
        <div class="form-group row" style="margin-top: 1%">
            <div class="col-sm-6 offset-3 text-center">
                <h6 class="display-4">URLS</h6>
            </div>
            <div class="col-sm-6 offset-3" style="margin-top: 4%">
                <input type="" name="url" class="form-control form-control-lg" id="colFormLabelLg" placeholder="Enter your ugly url --> &#128122;">
            </div>
            <div class="col-sm-2 offset-5" style="margin-top: 1%">
                <button type="submit" class="btn btn btn-outline-secondary btn-block">Submit</button>
            </div>
            <div class="col-sm-6 offset-3 text-center" style="margin-top: 1%">
                <a>
                 <?php
                 echo $_SESSION['url'];
                 unset($_SESSION['url']);
                 ?>
                </a>
            </div>
            <div class="col-sm-6 offset-3 text-center" style="margin-top: 1%">
                <a>
                    <?php
                    echo $_SESSION['token'];
                    unset($_SESSION['token']);
                    ?>
                </a>
            </div>
        </div>
    </form>
</div>
</body>
</html>