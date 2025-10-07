<?php
	if(isset($_SESSION['u_id'])) {
		// user logged in
	} else {
		echo "<script> window.location='index'; </script>";
	}	
	include_once('webheader.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>My Profile</title>
   <link rel="shortcut icon" type="image/png" href="images/tlogo.png" />
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="stylesheet" href="css/responsive.css">
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">

   <style>
      body {
         font-family: 'Poppins', sans-serif;
         background: #f4f6f9;
      }
      .profile-card {
         max-width: 500px;
         margin: 80px auto;
         padding: 30px;
         box-shadow: 0 6px 18px rgba(0,0,0,0.1);
         border-radius: 15px;
         background-color: #fff;
         text-align: center;
         transition: transform 0.3s;
      }
      .profile-card:hover {
         transform: translateY(-5px);
      }
      .profile-card img {
         width: 120px;
         height: 120px;
         border-radius: 50%;
         object-fit: cover;
         margin-bottom: 20px;
         border: 4px solid #007bff;
      }
      .profile-card h3 {
         font-weight: 600;
         margin-bottom: 10px;
         color: #333;
      }
      .profile-card h4 {
         font-size: 18px;
         color: #007bff;
         margin-bottom: 20px;
      }
      .profile-card p {
         font-size: 15px;
         color: #555;
         margin: 5px 0;
      }
      .profile-card .btn {
         margin-top: 15px;
         padding: 10px 20px;
         border-radius: 25px;
         font-weight: 600;
      }
   </style>
</head>
<body>

<div class="contact_section layout_padding">
   <div class="container">
      <div class="profile-card">
         <!-- Profile image (placeholder if none) -->
         <img src="images/default-profile.png" alt="Default Profile Picture">

         <h4>Edit Your Info</h4>
         <h3>Hello, <?php echo $_SESSION['u_name']; ?></h3>

         <p><strong>ID:</strong> <?php echo $fetch->id ?></p>
         <p><strong>Name:</strong> <?php echo $fetch->name ?></p>
         <p><strong>Email:</strong> <?php echo $fetch->email ?></p>
         <p><strong>Mobile:</strong> <?php echo $fetch->mobile_no ?></p> 
      

         
         <a href="edit_profile?edit_customer=<?php echo $fetch->id ?>" class="btn btn-primary">
            <i class="fa fa-pencil"></i> Edit Profile
         </a>

         <!-- Back button -->
         <a href="index" class="btn btn-secondary ">
            <i class="fa fa-home"></i> Back to Home
         </a>
         
         
      </div>
   </div>
</div>

<?php 
include_once('footer.php'); 
?>
</body>
</html>
