<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Fetch Data From URL in HTML 
    </title>
</head>
<body>


    <h1>Fetch Data From URL in HTML</h1>
    <p>
        <?php
            $url = "https://ssc.digialm.com///per/g27/pub/2207/touchstone/AssessmentQPHTMLMode1//2207O23185/2207O23185S16D96689/16903725363856045/4419003305_2207O23185S16D96689E1.html";
            $data = file_get_contents($url);
           // echo $data;
        ?>



        
    </p>


    <script>
                      

for (var totalMarks = 0, s = 0; s < 4; s++) {

    var sectionLabels = document.querySelectorAll('.section-lbl');
    var sectionTexts = sectionLabels[s].querySelector('span.bold').textContent;

  for ( var right = 0,notAttempted = 0, bonus = 0, i = 25 * s;i < 25 * s + 25;i++) {
    " -- " ===
      document
        .getElementsByClassName("question-pnl")
        [i].getElementsByClassName("bold")[5].textContent && notAttempted++;
       // var sectionTexts = sectionLabels[i].querySelector('span.bold').textContent;
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
    (totalMarks += marks);

  console.log(
    "Section Name : " +
    sectionTexts +
      "\nAttempted : " +
      (25 - notAttempted) +
      "\nRight Answers : " +
      right +
      "\nWrong Answers : " +
      wrong +
      "\nBonus : " +
      bonus +
      "\nMarks : " +
      marks
  );
}
console.log("\nTotal Marks : " + totalMarks);


    </script>

<?php

$dom = new DOMDocument();
$dom->loadHTML($data);
$xpath = new DOMXPath($dom);
/*
$elements = $xpath->query('//div[@class="section-lbl"]');
foreach($elements as $element){
    echo $element->nodeValue . "<br/>";
}
*/


 


for ( $totalMarks = 0, $s = 0; $s < 4; $s++) {

    $sectionLabels = $xpath->query('//div[@class="section-lbl"]');
    //$sectionTexts = $sectionLabels[$s]->getElementsByTagName('span')->item(0)->nodeValue;
    $sectionValue = $sectionLabels[$s]->getElementsByTagName('span')->item(1)->nodeValue;


  for ( $right = 0,$notAttempted = 0, $bonus = 0, $i = 25 * $s;$i < 25 * $s + 25;$i++) {
    " -- " ===
    /*
      $xpath->query('//div[@class="question-pnl"]')[$i]->getElementsByTagName('table')->item(0)->getElementsByTagName('tbody')->item(0)->getElementsByTagName('tr')->item(0)->getElementsByTagName('table')->item(0)->getElementsByTagName('tbody')->item(0)->getElementsByTagName('tr')->item(3)->getElementsByTagName('td')->item(2)->nodeValue && $notAttempted++;
      */


      $xpath->query('//div[@class="question-pnl"]')[$i]->getElementsByTagName('td')->item(17)->nodeValue[0] && $notAttempted++;
       // var sectionTexts = sectionLabels[i].querySelector('span.bold').textContent;       
      
      

       echo $xpath->query('//div[@class="question-pnl"]')[$i]->getElementsByTagName('td')->item(17)->nodeValue[0];

      


      
    try {
      $xpath->query('//div[@class="question-pnl"]')[$i]->where('class', 'rightAns')->item(0)->nodeValue[0]
      ===
        $xpath->query('//div[@class="question-pnl"]')[$i]->getElementsByTagName('td')->item(17)->nodeValue && $right++;
    } catch( Exception $e) {
      $bonus++;
    }
  }
  ($wrong = 25 - $notAttempted - $right - $bonus);
    ($marks = 2 * ($right + $bonus) - 0.5 * $wrong);
    ($totalMarks += $marks);

    echo( "<b> Section Name </b>: " .  $sectionValue . "<br/>" .
      "Attempted : " .
      (25 - $notAttempted) .
      "<br/>" .
      "Right Answers : " .
      $right .
      "<br/>" .
      "Wrong Answers : " .
      $wrong .
      "<br/>" .
      "Bonus : " .
      $bonus .
      "<br/>" .
      "Marks : " .
      $marks . "<br/>" 
    );

}

echo("\nTotal Marks : " . $totalMarks);





?>
    

</body>
</html>