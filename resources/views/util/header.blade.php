<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <title>Shopping Cart - GeekBooks - MIS 314 Sample Bookstore</title>
      <link rel="stylesheet" href="/css/test.css" type="text/css" />
   </head>
   <body>
      <!--Begin header include -->

<header>
   <div class="logo">
      <a href="{{route('inicio')}}">
         <img src="/img/logo.png"
              alt="GeekBooks"></a>
   </div>
   <div class="utilities IsDesktop">
      <map name="utilities">
         <area href="ShoppingCart.php" shape="rect" coords="0,0,104,22" alt="Shopping Cart" />
         <area href="checkout.php" shape="rect" coords="105,0,216,22" alt="Your Account" />
      </map>
      <img src="/img/shoppingcart.jpg"
           usemap="#utilities" style="height:22px ;width:216px; border:0;" alt="shopping cart" />
      <a href="about.php" style="text-decoration:none;">
         <img  src="/img/exclamation-clear.gif"
               alt="About this site" style="margin-left:25px; width: 20px; height: 20px;border:none;" />
         <span class="about" >About this Sample Site</span></a>
   </div>
   <div class="mobileLinks IsMobile">
      <a href="ShoppingCart.php">Cart</a>
      <a href="checkout01.php">Account</a>           
      <a href="about.php">About</a>     
   </div>        
</header>