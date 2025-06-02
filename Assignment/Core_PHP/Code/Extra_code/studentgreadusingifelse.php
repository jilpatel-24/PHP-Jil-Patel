<html>
<head>
  <title>Result Check</title>
</head>
<body>

  <h3>Enter your Marks & Check Grade</h3>
  <form action="" method="post">
    <p>Hindi: <input type="number" name="hindi" required min="0" max="100"></p>
    <p>English: <input type="number" name="english" required min="0" max="100"></p>
    <p>Gujarati: <input type="number" name="gujarati" required min="0" max="100"></p>
    <p><input type="submit" name="submit" value="Submit"></p>
  </form>
  </body>
</html>

<?php
if(isset($_REQUEST['submit']))
{
	$hindi=$_REQUEST['hindi'];
	$english=$_REQUEST['english'];
	$gujarati=$_REQUEST['gujarati'];
	
	$total=$hindi+$english+$gujarati;
	echo "<h4 style='color:blue'> Total Marks is : ".$total."</h4>";
	
	$per=($total*100)/300;
    echo "<h4 style='color:gray'> Total percantages : ".$per."%</h4>";
	if($per>90)
	{
		echo $grade="<h4 style='color:green'> A+ Garde </h4>";
	}
	elseif($per>80)
	{
		echo $grade="<h4 style='color:green'>  A Garde </h4>";
	}
	elseif($per>70)
	{
		echo $grade="<h4 style='color:green'>  B+ Garde </h4>";
	}
	elseif($per>60)
	{
		echo $grade="<h4 style='color:green'>  B Garde </h4>";
	}
	elseif($per>50)
	{
		echo $grade="<h4 style='color:green'>  C+ Garde  </h4>";
	}
	elseif($per>40)
	{
		echo $grade="<h4 style='color:green'>  C Garde </h4>";
	}
	else
	{
		echo $grade="<h4 style='color:red'>  Fail </h4>";
	}	
}

?>