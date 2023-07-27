<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<style type="text/css">

/* Global styles */
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f8f6f6;
  
}

/* Header styles */
header {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
}

header h1 {
  margin: 0;
}

/* Main content styles */
main
{

 position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    /* background: #f8f6f6; */
    border-radius: 5px;
    /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); */
    text-align: center;
	
	
}

main h1 {
	color: #333;
	font-size: 3em;
}

main p {
	font-size: 1.2em;
}

/* Main content styles Ends */


/* Footer styles */
footer {
	position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;

  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
}

footer p {
  margin: 0;
}

footer a {
  color: #fff;
  text-decoration: none;
 
}

/* Media queries */
@media only screen and (min-width: 768px) {
  main {
    max-width: 600px;
    margin: 0 auto;
  }
}

</style>
</head>
<body>

	<header>
		<h1>Server Error</h1>
	</header>

	<main>
		<h1><?php echo $heading; ?></h1>
		<p>
			<?php echo $message; ?>

		</p>
		<a href="https://students.nandysagar.in/">
			Go to Home Page
		</a>
	</main>

	<footer>
		<p>
			&copy; <?php echo date('Y'); ?> <a href="https://www.students.nandysagar.in">MSMS - All 
			Rights Reserved. </a>

			
		</p>

		

		
	</footer>

</body>
</html>