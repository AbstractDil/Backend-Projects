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

/*
$dom = new DOMDocument();
$dom->loadHTML($data);
$xpath = new DOMXPath($dom);

$totalMarks = 0;

for ($s = 0; $s < 4; $s++) {
    $sectionLabels = $xpath->query('//div[@class="section-lbl"]');
    $sectionValue = $sectionLabels[$s]->getElementsByTagName('span')->item(1)->nodeValue;

    $right = 0;
    $notAttempted = 0;
    $bonus = 0;
    $wrong = 0;

    for ($i = 25 * $s; $i < 25 * ($s + 1); $i++) {
        $notAttemptedValue = trim($xpath->query('//div[@class="question-pnl"]')[$i]->getElementsByTagName('td')->item(17)->nodeValue);
        if ($notAttemptedValue === "--") {
            $notAttempted++;
        }

        try {
            $rightAnsValue = trim($xpath->query('//div[@class="question-pnl"]')[$i]->getElementsByTagName('td')[0]->nodeValue);
            $userAnswer = trim($xpath->query('//div[@class="question-pnl"]')[$i]->getElementsByTagName('td')->item(17)->nodeValue);
            if ($rightAnsValue === $userAnswer) {
                $right++;
            }
        } catch (Exception $e) {
            $bonus++;
        }
    }

    $wrong = 25 - $notAttempted - $right - $bonus;
    $marks = 2 * ($right + $bonus) - 0.5 * $wrong;
    $totalMarks += $marks;

    echo ("<b> Section Name </b>: " . $sectionValue . "<br/>" .
        "Attempted : " . (25 - $notAttempted) . "<br/>" .
        "Right Answers : " . $right . "<br/>" .
        "Wrong Answers : " . $wrong . "<br/>" .
        "Bonus : " . $bonus . "<br/>" .
        "Marks : " . $marks . "<br/>");
}

echo ("\nTotal Marks : " . $totalMarks);
*/
?>



<?php
$dom = new DOMDocument();
$dom->loadHTML($data);
$xpath = new DOMXPath($dom);

$totalMarks = 0;

for ($s = 0; $s < 4; $s++) {
    $sectionLabels = $xpath->query('//div[@class="section-lbl"]');
    $sectionValue = $sectionLabels[$s]->getElementsByTagName('span')->item(1)->nodeValue;

    $right = 0;
    $notAttempted = 0;
    $bonus = 0;
    $wrong = 0;

    for ($i = 25 * $s; $i < 25 * ($s + 1); $i++) {
        $notAttemptedValue = trim($xpath->query('//div[@class="question-pnl"]')[$i]->getElementsByTagName('td')->item(17)->nodeValue);
        if ($notAttemptedValue === "--") {
            $notAttempted++;
        }

        try {
            $rightAnsValue = trim($xpath->query('//div[@class="question-pnl"]')[$i]->getElementsByTagName('td[@class"=rightAns")]')->item(0)->nodeValue);

            echo $rightAnsValue;

            $userAnswer = trim($xpath->query('//div[@class="question-pnl"]')[$i]->getElementsByTagName('td')->item(17)->nodeValue);
            if ($rightAnsValue === $userAnswer) {
                $right++;
            }
        } catch (Exception $e) {
            $bonus++;
        }
    }

    $wrong = 25 - $notAttempted - $right - $bonus;
    $marks = 2 * ($right + $bonus) - 0.5 * $wrong;
    $totalMarks += $marks;

    echo ("<b> Section Name </b>: " . $sectionValue . "<br/>" .
        "Attempted : " . (25 - $notAttempted) . "<br/>" .
        "Right Answers : " . $right . "<br/>" .
        "Wrong Answers : " . $wrong . "<br/>" .
        "Bonus : " . $bonus . "<br/>" .
        "Marks : " . $marks . "<br/>");
}

echo ("\nTotal Marks : " . $totalMarks);
?>

</p>

    

</body>
</html>