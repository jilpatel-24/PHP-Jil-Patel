<html>
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- site metas -->
      <title>Sign-Up</title>
      <link rel="shortcut icon" type="image/png" href="images/tlogo.png" />
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- font css -->
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   </head>
<body>
<?php 

if(isset($_SESSION['u_id']))
{
  echo "<script>
      window.location='index';
  </script>";
}
include_once('webheader.php'); 
?>

<div class="contact_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <h1 class="contact_taital">Sign-Up</h1>
         </div>
      </div>
   </div>
   <div class="container-fluid">
      <div class="contact_section_2">
         <div class="row">
            <div class="col-md-12">
               <div class="mail_section_1">
                  <form  method="post">
                     <input type="text" class="mail_text" placeholder="Your Name" name="name" id="" required>
                     <input type="email" class="mail_text" placeholder="Your Email" name="email" id="" required>
                     <input type="password" class="mail_text" placeholder="Your Password" name="password" id="" required>
                     <input type="text" class="mail_text" placeholder="Your Mobile No." name="mobile_no" id="" required>

                     <p style="margin-top: 15px;"><a href="login">Already have an account? Click here to login</a></p>
                     <div class="send_bt">
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                     </div>
                  </form>
               </div>
            </div>          
         </div>
      </div>
   </div>
</div>

<?php 
include_once('footer.php'); 
?>
</body>
</html>
