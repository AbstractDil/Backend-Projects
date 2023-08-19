
<?php

$OrgID = "Score Card Generator";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Welcome to <?php echo $OrgID; ?>
    </title>

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>

    .navbar{
        border-radius: 0px !important;
    }
    .navbar a {
        color: white !important;
        
        
    }
    .navbar-nav > li > a:hover{
        background-color: white !important;
        color: black !important;
    }

   

    .navbar-nav > li > a:active{
        background-color: white !important;
        color: black !important;
    }

    

    .navbar-nav > li > a:focus{
        background-color: white !important;
        color: black !important;
    }
    .bg-light{
        background-color: #f8f9fa !important;
    }

</style>

</head>
<body class="bg-light">

<?php include "../_partials/navbar.php" ?>



<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

        <h3>
            <?php echo $OrgID; ?>
        </h3>



        <form class="form-inline " style="margin-top:15px;" method="POST" action="ssc.php">
            <div class="form-group">
               
                <input type="url" class="form-control" id="url" name="url" placeholder="Paste Answer Key Url">
            </div>
            <input type="submit" class="btn btn-success" name="generate" value="Generate">
            </form>
        </div>
    </div>
</div>
    



</body>
</html>
