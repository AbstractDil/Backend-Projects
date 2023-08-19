<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        MathHub Score Card Generating System v1.0.0
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>

        body{
            font-size : 18px !important;
        }


        footer {
            background-color: #fff;
            color: #4f5050;

            text-align: center;
            font-size: 12px;
            border-top: 1px solid #000;

            position: fixed;
            bottom: 0;
            width: 100%;

        }
       
        .print-pnl{
            display: none !important;
        }

        .menu-tbl {
            background-color: #eef2f5;
            border-radius: 5px;
            padding:  24px !important;
            margin-right: 10px;
            font-size: 12px;
       }

       .menu-tbl tbody tr:nth-child(1) td:nth-child(1), .menu-tbl tbody tr:nth-child(1) td:nth-child(2){
           /* padding: 5px !important; */
           
        padding-top : 5px !important;
          
         }

            .menu-tbl tbody tr:nth-child(3) td:nth-child(1), .menu-tbl tbody tr:nth-child(3) td:nth-child(2){
            padding-bottom : 5px !important;
            }

        .question-pnl {
            background-color: #fff;
            box-sizing: border-box;
            border: 1px solid #ccc;
            page-break-inside: avoid !important;
            padding: 10px;
}
        .section-lbl {
            background-color: #99999b;
            color: #fff;
            padding: 6px;
            margin : 10px 0px 10px 0px;
        }

        #printSection{
            position:relative;
            left: 0px;
            top: 0px;
            z-index:9999 !important;
            }
        @media print {
            .table thead{
                /* background-color: #007bff !important; */
                color: #000 !important;
            }

          
          

            
        }

        /* Set A4 Size page automatically while print */

            @media print {
            @page {
            size: A4;
            /* margin: 0; */
            }

            }
    </style>

</head>
<body class="bg-light">

     <!-- Header Start -->

<header>
    <nav class="navbar fixed-top navbar-light bg-white mb-5 border-bottom">
        <a class="navbar-brand">

            <img src="https://mathhub.me/mathhub/images/combined/Logo.png" alt="logo" width="30" height="30" class="d-inline-block align-top">

            <strong>

                MSCGS
            </strong>
        </a>
        <div class="d-flex">


            <!-- Show timer -->

            <button class="btn btn-warning" onclick="window.print()">
           Print Score Card 
        </button>

        </div>
            <!-- Show timer ends -->
    </nav>

</header>
    <!-- Header Ends -->








    <!-- Show Results  -->

    <div class="container-fluid mt-4" id="printResult">
    <div class="d-print-none ">
    <marquee behavior="" direction="left">
    <p class="text-danger font-weight-bold pt-5">
       *** For best experience use desktop or laptop ***
    </p>
  </marquee>
           
       </div>
         
    
        <div class="row">

      
           


        <div class="col-md-12 " >

<!-- Score Card  -->

        <div class="card">

        <div class="card-header font-weight-bold bg-secondary text-white">
        Score Card

        </div>

            <div class="card-body table-responsive">
    
                <table class="table table-bordered text-center table-sm">
                <thead class='bg-info text-light' style="font-size:14px !important;"><tr ><th scope="col" class="p-2">Section Name</th>
                <th scope="col" class="p-2">No. of Questions</th>
                <th scope="col" class="p-2">Attempted</th><th scope="col" class="p-2">Not Attempted</th><th scope="col" class="p-2">Right</th><th scope="col" class="p-2">Wrong </th><th scope="col" class="p-2">Bonus</th><th scope="col" class="p-2">Marks</th></tr></thead>
                    <tbody id="result"></tbody>
                </table>
            </div>
        </div>




        </div>


        
        
    </div>

    
    
</div>








    <div class="container-fluid mt-3 mb-5 pb-4">
        <?php


 if($_POST['generate']){

    $url = $_POST['url'];


            // $url = "https://ssc.digialm.com///per/g27/pub/2207/touchstone/AssessmentQPHTMLMode1//2207O23185/2207O23185S50D109809/16905244742204258/4419015132_2207O23185S50D109809E1.html";

            $data = file_get_contents($url);

            // donot fetch data which is in the head tag

            $data = str_replace("<head>","<head><base href='$url'>",$data);

            // remove all the script tag

            $data = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $data);

            // remove all the style tag

            $data = preg_replace('#<style(.*?)>(.*?)</style>#is', '', $data);

            // remove meta tag

            $data = preg_replace('#<meta(.*?)>#is', '', $data);

            // remove link css tag

            $data = preg_replace('#<link(.*?)>#is', '', $data);

 }  


?>

<div class="card mb-5" >
    <div class="card-header bg-secondary text-white font-weight-bold">
        Question Paper With Answer Key
    </div>
    <div class="card-body table-responsive">
        <?php echo $data; ?>
    </div>
</div>




</div>


  
<footer class="border-top d-print-none">
        <p class="pt-2 pb-0 mb-0">
            <span id="Year"></span> MathHub Score Card Generating System v1.0.0
            <span id="systemVersion"></span>
        </p>
        <p class="mb-1">
            <small class="text-muted">
                Design &amp; Developed by <a href="https://www.nandysagar.in" target="_blank"> Sagar Nandy</a>
            </small>
        </p>
    </footer>


<script>

   



var result = document.getElementById("result");



    var totalMarks = 0;

for (var s = 0; s < 4; s++) {

var sectionLabels = document.querySelectorAll('.section-lbl');
var sectionTexts = sectionLabels[s].querySelector('span.bold').textContent;

var right = 0, notAttempted = 0, bonus = 0;

for (i = 25 * s;i < 25 * s + 25;i++) {
" -- " ===
  document.getElementsByClassName("question-pnl")[i].getElementsByClassName("bold")[5].textContent && notAttempted++;
   
try {
  document
    .getElementsByClassName("question-pnl")
    [i].getElementsByClassName("rightAns")[0].textContent[0] ===
    document
      .getElementsByClassName("question-pnl")
      [i].getElementsByClassName("bold")[5].textContent && right++;
} catch {
  bonus++;
}
}
(wrong = 25 - notAttempted - right - bonus),
(marks = 2 * (right + bonus) - 0.5 * wrong),
(totalMarks += marks),





result.innerHTML += "<tr><td>" + sectionTexts + "</td><td>"+25+"</td><td>" + (25 - notAttempted) + "</td><td>" + notAttempted + "</td><td>" + right + "</td><td>" + wrong + "</td><td>" + bonus + "</td><td>" + marks + "</td></tr>";

// calculate percentage of each section
var percentage = (marks / 50) * 100;

// show percentage upto 2 decimal places

percentage = percentage.toFixed(2);


console.log("Section Name : " + sectionTexts + "\nAttempted : " + (25 - notAttempted) + "\nUnattempted : " + notAttempted + "\nRight Answers : " + right + "\nWrong Answers : " + wrong + "\nBonus : " + bonus + "\nMarks : " + marks + "\nPercentage : " + percentage + "%" + "\n\n");




/*
console.log(
"Section Name : " +
sectionTexts +
  "\nAttempted : " +
  (25 - notAttempted) +
  "\nUnattempted : " +
    notAttempted +
  "\nRight Answers : " +
  right +
  "\nWrong Answers : " +
  wrong +
  "\nBonus : " +
  bonus +
  "\nMarks : " +
  marks
);
*/
}
console.log("\nTotal Marks : " + totalMarks);

// show results in html sectionwise


result.innerHTML += "</tbody>";


var totalPercentage = (totalMarks / 200) * 100;

// show percentage upto 2 decimal places

totalPercentage = totalPercentage.toFixed(2);


result.innerHTML += "<tr><td colspan='4'> <b class='text-primary'> Total Marks </b>: <span class='font-weight-bold text-danger'> " + totalMarks + "</span></td><td colspan='4'> <b class='text-primary'> Total Percentage </b>: <span class='font-weight-bold text-danger'> " + totalPercentage + "%</span></td></tr>";


// total percentage


result.innerHTML += "<tr></tr>";



// add .table class to the table under .main-info-pnl

var mainInfoPnl = document.querySelector('.main-info-pnl');

var table = mainInfoPnl.querySelector('table');

table.classList.add('table');

table.classList.add('table-bordered');

table.classList.add('my-3');

// remove border, style cellspacing and cellpadding from the table 

table.removeAttribute('border');
table.removeAttribute('cellspacing');
table.removeAttribute('cellpadding');

table.removeAttribute('style');














</script>


    

</body>
</html>
