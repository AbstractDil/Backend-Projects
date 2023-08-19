
<?php

$OrgID = "NANDYSAGAR.IN";

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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

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

</style>

</head>
<body>

<?php include "_partials/navbar.php" ?>
    

<h1>
    <?php
        //echo " Welcome to " . $OrgID ." <br>";

        $a =  $OrgID . " is a Web Development Company in Nadia, West Bengal.";

       

    ?>



</h1>

<div class="container">
  <div class="jumbotron">
    <h1>
        <?php echo $OrgID; ?>
    </h1>
    <p>
        <?php echo $a; ?>
    </p>
  </div>
 
</div>




<!-- Generate Links from Current Folders  -->

<div class="container">

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <table class="table">
        
            <thead>


            <tr>
                Root Directory: <?php echo getcwd(); ?>
            </tr>

                <tr>
                    <th>
                        File Name
                    </th>
                    <th>
                        File Size
                    </th>
                    <th>
                        File Type
                    </th>
                    <th>
                        View
                    </th>
                </tr>
            </thead>
        
            <tbody>
        
            <?php
        
                $dir = getcwd();
                $files = scandir($dir);
                foreach($files as $file){
                    if($file != "." && $file != ".."){
                        echo "<tr>";
                        echo "<td>$file</td>";
                        echo "<td>".filesize($file)."</td>";
                        echo "<td>".filetype($file)."</td>";

                        if(filetype($file) == "dir"){
                            $file = $file . "/";

                            // disable download button for folders 

                            echo "<td><a href='$file' class='btn btn-primary disabled'>/</a></td>";

                        }else{
                            echo "<td><a href='$file' class='btn btn-primary'>View</a></td>";
                        }

                   
                        
                    }
                }
        
            ?>
        
            </tbody>
        
        </table>

        <!-- files under SSC  -->

        <table class="table">
        
            <thead>
                <tr>
                    <th>
                        Files under SSC
                    </th>
                </tr>
                <tr>
                    <th>
                        File Name
                    </th>
                    <th>
                        File Size
                    </th>
                    <th>
                        File Type
                    </th>
                    <th>
                        View
                    </th>
                </tr>

                </thead>

                <tbody>
                    <?php 

                        $dir = getcwd()."/SSC";
                        $files = scandir($dir);
                        foreach($files as $file){
                            if($file != "." && $file != ".."){
                                echo "<tr>";
                                echo "<td>$file</td>";
                                echo "<td>".filesize($file)."</td>";
                                echo "<td>".filetype($file)."</td>";

                                if(filetype($file) == "dir"){
                                    $file = $file . "/";

                                    // disable download button for folders 

                                    echo "<td><a href='/SSC/$file' class='btn btn-primary disabled'>/</a></td>";

                                }else{
                                    echo "<td><a href='/SSC/$file' class='btn btn-primary'>View</a></td>";
                                }

                        
                                
                            }
                        }

                    ?>
                </tbody>
                </table>


                <!-- files under Practice  -->

                <table class="table">
        
                    <thead>
                        <tr>
                            <th>
                                Files under Practice
                            </th>
                        </tr>
                        <tr>
                            <th>
                                File Name
                            </th>
                            <th>
                                File Size
                            </th>
                            <th>
                                File Type
                            </th>
                            <th>
                                View
                            </th>
                        </tr>
        
                        </thead>
        
                        <tbody>
                            <?php 
        
                                $dir = getcwd()."/Practice";
                                $files = scandir($dir);
                                foreach($files as $file){
                                    if($file != "." && $file != ".."){
                                        echo "<tr>";
                                        echo "<td>$file</td>";
                                        echo "<td>".filesize($file)."</td>";
                                        echo "<td>".filetype($file)."</td>";
        
                                        if(filetype($file) == "dir"){
                                            $file = $file . "/";
        
                                            // disable download button for folders 
        
                                            echo "<td><a href='/Practice/$file' class='btn btn-primary disabled'>/</a></td>";
        
                                        }else{
                                            echo "<td><a href='/Practice/$file' class='btn btn-primary'>View</a></td>";
                                        }
        
                                
                                        
                                    }
                                }
        
                            ?>
                        </tbody>
                        </table>
    </div>
</div>


<?php

  /*
    $dir = getcwd();
    $files = scandir($dir);
    foreach($files as $file){
        if($file != "." && $file != ".."){
            echo "<a href='$file'>$file</a><br>";
        }
    }
    */

    // get files from Practice Folder 
    /*

    $dir = getcwd()."/Practice";
    $files = scandir($dir);
    foreach($files as $file){
        if($file != "." && $file != ".."){
            echo "<a href='$file'>$file</a><br>";
        }
    }

    // get files from SSC folder 

    $dir = getcwd()."/SSC";

    $files = scandir($dir);

    foreach($files as $file){
        if($file != "." && $file != ".."){
            echo "<a href='$file'>$file</a><br>";
        }
    }
*/


?>

</div>






</body>
</html>