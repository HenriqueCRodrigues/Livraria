@include('util.header')
<!--End header include -->

      <div id="pageContainer">
         <!-- start content -->
         <div id="checkoutContent">
            
<!-- start page content *************** -->


<div class="pageTitle">Shipping Information</div>

<p class='centeredNotice'>New Customer - Please provide your shipping address.</p><br>
   <form method="post" action="checkout03.php" autocomplete="on" class="myForm">

      <div class="formGroup">
         <label for="email">
            Email: </label>

         <input type="email" name="email" value="tanabebr@gmail.com" required placeholder="Enter Email" maxlength="50" />
      </div>

      <div class="formGroup">
         <label for="fname">
            First name: </label>
         <input type="text" name="fname" value="" autofocus required  
                placeholder="First name" title="first name" maxlength="20" pattern="[A-Za-z'-]{2,20}" />
      </div>
      <div class="formGroup">
         <label for="lname">
            Last name: </label>
         <input type="text" name="lname" value="" required 
                placeholder="Last name" title="last name" maxlength="20" pattern="[A-Za-z'-]{2,20}" />
      </div>
      <div class="formGroup">
         <label for="street">
            Street: </label>
         <input type="text" name="street" value="" required 
                placeholder="Street address" title="street address" maxlength="25" />
      </div>
      <div class="formGroup">
         <label for="city">
            City:</label>
         <input type="text" name="city" value="" required 
                placeholder="City" title="city" maxlength="30"  pattern="[A-Za-z'-]{2,30}" />
      </div>
      <div class="formGroup">
         <label for="state">
            State:</label>
         <td>
            <input type="text" name="state" style="width:40px" value="" required 
                   placeholder="ST" title="2-character state abbreviation" max length="2" pattern="[A-Za-z]{2}" />
      </div>
      <div class="formGroup">
         <label for="zip">
            Zip: </label>
         <input type="text" name="zip" style="width:80px;" value="" required 
                placeholder="Zip" title="zip" maxlength="5" pattern="[0-9]{5}" />
      </div>
      <div class="formGroup">
         <label></label>

         <input type="hidden" name="custIDe" value="">
         <input class="inputImage" type="image" src="/img/buy-now.gif">
      </div>
   </form>
   <br>
<!-- must use method post to transfer encrypted custID. Cannot transfer in query string due to URL encoding -->
   
<!-- end page content *************** -->
         </div> 
         <!-- end content -->

         <!--Begin footer include -->
         @include('util.footer')
