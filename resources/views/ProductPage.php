@include('util.header')
<!--End header include -->



      <div id="pageContainer">
         <div id="leftColumn">
            <!--Begin menu include -->

<div class="menuContainer">
   <div class="menuSearch" >
      <div class="menuHead">
         Search
      </div>

      <div class="menuBorder">
         <form action="SearchBrowse.php" >
            <input type="text" name="search" autofocus />
            <input type="submit" value="Search" class="button fullWidth" />
         </form>
      </div>
   </div>

   <nav class="IsDesktop">
      <div class="menuHead">
         Browse
      </div>

      <div class="menuBorder">

         <a href='SearchBrowse.php?catID=5&catName=ASP.NET' class='menuitem'>ASP.NET</a><br />
 <a href='SearchBrowse.php?catID=9&catName=JavaScript' class='menuitem'>JavaScript</a><br />
 <a href='SearchBrowse.php?catID=2&catName=MySQL' class='menuitem'>MySQL</a><br />
 <a href='SearchBrowse.php?catID=1&catName=PHP' class='menuitem'>PHP</a><br />
 <a href='SearchBrowse.php?catID=6&catName=Regular%20Expressions' class='menuitem'>Regular Expressions</a><br />
 <a href='SearchBrowse.php?catID=4&catName=SQL' class='menuitem'>SQL</a><br />
 <a href='SearchBrowse.php?catID=3&catName=Web%20Usability' class='menuitem'>Web Usability</a><br />
 
      </div>
   </nav>
</div>

<!--End menu include -->
         </div>
         <!-- start dynamic content -->
         <div id="pageContent">
            
<!-- start page content *************** -->


   <div class="bookTitle"> Mastering Regular Expressions  </div>

   <div class="authors">by <a href='SearchBrowse.php?search=Friedl'>Jeffrey Friedl</a></div>
   <a href="/sandvig/mis314/assignments/bookstore/bookimages/0596528124.01.LZZZZZZZ.jpg">
      <img class="Book" alt="Mastering Regular Expressions  " title="Mastering Regular Expressions  "
           src="/sandvig/mis314/assignments/bookstore/bookimages/0596528124.01.MZZZZZZZ.jpg">
   </a> <br />

   <div>
      <span class="priceLabel">List Price: </span>
      <span class="bookPriceList">
         $44.99      </span>
   </div>

   <div>
      <span class="priceLabel">Our Price:</span>
      <span class="bookPriceB">
         $35.99 </span>
   </div>

   <div>
      <span class="priceLabel">You Save:</span>
      <span class="bookPriceB">
         $9.00 (20%)</span><br />
   </div>

   <div class="bookDetails">
      <div> <b>ISBN:</b> 0596528124 </div>
      <div> <b>Publisher:</b> O'Reilly Media</div>
      <div>  <b>Pages:</b> 515</div>
      <div> <b>Edition:</b> 3</div>
   </div> 

   <a href="ShoppingCart.php?addISBN=0596528124">
      <img class="addToCart" src="/sandvig/mis314/assignments/bookstore/images/add-to-cart-small.gif" 
           alt="Add to cart" title="Add to cart" ></a>

   <div class="bookDescription">
   <p>Regular expressions are an extremely powerful tool for manipulating  text and data. They are now standard features in a wide range of  languages and popular tools, including Perl, Python, Ruby, Java, VB.NET  and C# (and any language using the .NET Framework), PHP, and MySQL.</p><p> If you don't use regular expressions yet, you will discover in this  book a whole new world of mastery over your data. If you already use  them, you'll appreciate this book's unprecedented detail and breadth of  coverage. If you think you know all you need to know about regular  expressions, this book is a stunning eye-opener.</p><p> As this book  shows, a command of regular expressions is an invaluable skill. Regular  expressions allow you to code complex and subtle text processing that  you never imagined could be automated. Regular expressions can save you  time and aggravation. They can be used to craft elegant solutions to a  wide range of problems. Once you've mastered regular expressions,  they'll become an invaluable part of your toolkit. You will wonder how  you ever got by without them.</p><p> Yet despite their wide  availability, flexibility, and unparalleled power, regular expressions  are frequently underutilized. Yet what is power in the hands of an  expert can be fraught with peril for the unwary. <em>Mastering Regular Expressions</em> will help you navigate the minefield to becoming an expert and help you optimize your use of regular expressions. </p><p> <em>Mastering Regular Expressions</em>,  Third Edition, now includes a full chapter devoted to PHP and its  powerful and expressive suite of regular expression functions, in  addition to enhanced PHP coverage in the central &quot;core&quot; chapters.  Furthermore, this edition has been updated throughout to reflect  advances in other languages, including expanded in-depth coverage of  Sun's <em>java.util.regex</em> package, which has emerged as the standard Java regex implementation.Topics include:</p><ul>  <li>A comparison of features among different versions of many languages and tools</li>  <li>How the regular expression engine works</li>  <li>Optimization (major savings available here!)</li>  <li>Matching just what you want, but not what you don't want</li>  <li>Sections and chapters on individual languages</li></ul><p> Written in the lucid, entertaining tone that makes a complex, dry topic  become crystal-clear to programmers, and sprinkled with solutions to  complex real-world problems, <em>Mastering Regular Expressions</em>, Third Edition offers a wealth information that you can put to immediate use.</p>   </div>
   <a href="ShoppingCart.php?addISBN=0596528124">
      <img class="addToCart"  src="/sandvig/mis314/assignments/bookstore/images/add-to-shopping-cart-blue.gif"  alt="Add to cart" title="Add to cart" >
   </a>
   
<!-- end page content *************** -->
         </div> 
         <!-- end dynamic content -->

         <!--Begin footer include -->
         @include('util.footer')


