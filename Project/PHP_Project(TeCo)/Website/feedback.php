<html>
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- site metas -->
      <title>Feedback</title>
      <link rel="shortcut icon" type="image/png" href="images/tlogo.png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- Font CSS -->
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   </head>
<body>
<?php 
include_once('webheader.php'); 
?>

<div class="contact_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <h1 class="contact_taital">Feedback Form</h1>
         </div>
      </div>
   </div>
   <div class="container-fluid">
      <div class="contact_section_2">
         <div class="row">
            <div class="col-md-12">
               <div class="mail_section_1">
                  <form method="post">
                     <input type="text" class="mail_text" placeholder="Order ID" name="order_id" >
                     <input type="text" class="mail_text" placeholder="Customer ID" name="cust_id" >
                     <textarea class="massage-bt" placeholder="Your Comments" rows="5" name="comment" ></textarea>

                     <div class="send_bt" style="margin-top: 15px;">
                        <button type="submit" name="submit" class="btn btn-primary">Submit Feedback</button>
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
