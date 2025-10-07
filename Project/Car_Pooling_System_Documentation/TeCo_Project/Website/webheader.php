<?php

function active($currect_page)
{
   $url_array =  explode('/', $_SERVER['REQUEST_URI']); // current page url
   $url = end($url_array);
   if ($currect_page == $url) {
      echo 'active text-secondary'; //class name in css 
   }
}

?>
<script>                   //This is For Whatsapp Chat
   var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?17879';
   var s = document.createElement('script');
   s.type = 'text/javascript';
   s.async = true;
   s.src = url;
   var options = {
      "enabled":true,
      "chatButtonSetting":{
            "backgroundColor":"#4dc247",
            "ctaText":"",
            "borderRadius":"25",
            "marginLeft":"0",
            "marginBottom":"50",
            "marginRight":"50",
            "position":"right"
      },
      "brandSetting":{
            "brandName":"TECO",
            "brandSubTitle":"Hi welcome to TECO Cafe",
            "brandImg":"https://cdn.clare.ai/wati/images/WATI_logo_square_2.png",
            "welcomeText":"Hi, there!\nHow can I help you?",
            "messageText":"Hello, I have a question about {{page_link}}",
            "backgroundColor":"#0a5f54",
            "ctaText":"Start Chat",
            "borderRadius":"25",
            "autoShow":false,
            "phoneNumber":""
      }
   };
   s.onload = function() {
        CreateWhatsappChatWidget(options);
   };
   var x = document.getElementsByTagName('script')[0];
   x.parentNode.insertBefore(s, x);
</script>

<div class="header_section header_bg">
   <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="index"><img src="images/logo4.png"></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
               <li class="nav-item"><a class="nav-link <?php active("index") ?>" href="index">Home</a></li>
               <li class="nav-item"><a class="nav-link <?php active("about") ?>" href="about">About</a></li>
               <li class="nav-item"><a class="nav-link <?php active("catagory") ?>" href="catagory">Categories</a></li>

               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle <?php active("product") ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Products
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <?php
                     
                     $categories = $this->getCategories();

                     foreach ($categories as $cat) 
                     {
                        echo '<a class="dropdown-item" href="product?cat_id=' . $cat['id'] . '">' .($cat['name']) . '</a>';
                     }
                     ?>
                  </div>
               </li>

               <li class="nav-item"><a class="nav-link <?php active("cart") ?>" href="cart">Cart</a></li>
               <li class="nav-item"><a class="nav-link <?php active("contact") ?>" href="contact">Contact</a></li>
               
               <?php
               if (isset($_SESSION['u_id'])) {
               ?>
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-expanded="false"><?php echo "Hello, " . $_SESSION['u_name'] ?></a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="my_profile">My Profile</a>
                        <a class="dropdown-item" href="contact">My Order</a>
                        <a class="dropdown-item" href="user_logout">Logout </a>
                     </div>
                  </li>

                  
                  
               <?php
               } else {
               ?>
                  <li class="nav-item"><a class="nav-link" href="login">Login</a></li>
               <?php
               }
               ?>



            </ul>
               
         </div>
      </nav>
   </div>
</div>