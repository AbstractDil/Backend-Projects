<?php

date_default_timezone_set('Asia/Kolkata');

$currentDateTime = new DateTime();
$startDate = new DateTime('2023-07-10');
$endDate = new DateTime('2023-07-13');

// Set the start and end time for the active period
$startTime = new DateTime('11:00:00');
$endTime = new DateTime('14:07:00');

?>

<div id="formDiv">


<?php

// Loop through the dates within the range
for ($date = clone $startDate; $date <= $endDate; $date->modify('+1 day')) {
    // Combine the current date with the start and end times
    $startDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $date->format('Y-m-d') . ' ' . $startTime->format('H:i:s'));
    $endDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $date->format('Y-m-d') . ' ' . $endTime->format('H:i:s'));

    // Check if the current date and time are within the active range
    if ($currentDateTime >= $startDateTime && $currentDateTime <= $endDateTime) {
        // The form is active, display the form
        ?>
       

            <form action="submit.php" method="POST">
                <!-- Your form fields go here -->
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required><br><br>
    
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required><br><br>
    
                <input type="submit" value="Submit">
            </form>
      
        <?php
        break; // Stop looping once the active period is found
    }
}

// If the loop completes without finding an active period, display a message
if ($date > $endDate) {
    echo "<div class='alert alert-danger font-weight-bold text-center h5'>
    Due to Security Reasons,
    The form is active only between {$startDate->format('M d, Y')} and {$endDate->format('M d, Y')} from {$startTime->format('h:i:s A')} to {$endTime->format('h:i:s A')} </div>";
}
?>

</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script>
    var formDiv = $('#formDiv');
    // refresh the form div every 5 seconds
    setInterval(function() {
        formDiv.load(location.href + ' #formDiv');
        console.log('refreshed');
    }, 5000);

</script>