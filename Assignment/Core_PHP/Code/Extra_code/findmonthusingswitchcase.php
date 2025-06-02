<html>
<head>
<title>Month Name Finder</title>
</head>
<body>

  <h1>Enter a Month Number (1-12):</h1>

  <form method="post">  
    <label for="month">Month Number:</label>
    <input type="number" id="month" name="month" min="1" max="12">
	<br><br>
    <button type="submit">Get Month Name</button>
  </form>
  </p>

</body>
</html>
<?php

  $monthNumber = $_POST["month"];

  switch ($monthNumber) {
    case 1:
      echo "January";
      break;
    case 2:
      echo "February";
      break;
    case 3:
      echo "March";
      break;
    case 4:
      echo "April";
      break;
    case 5:
      echo "May";
      break;
    case 6:
      echo "June";
      break;
    case 7:
      echo "July";
      break;
    case 8:
      echo "August";
      break;
    case 9:
      echo "September";
      break;
    case 10:
      echo "October";
      break;
    case 11:
      echo "November";
      break;
    case 12:
      echo "December";
      break;
    default:
      echo "Invalid month number.";
  }

?>
