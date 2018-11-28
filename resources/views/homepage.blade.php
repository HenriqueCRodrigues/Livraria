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
       @include('util.searchForm')

       @include('util.sidebar', ['categories'])

       <div class="menuBorder">
         <form method="POST" action="{{route('buscarLivros')}}" >
             @csrf
            <input type="text" name="search" autofocus />
            <input type="submit" value="Search" class="button fullWidth" />
         </form>
      </div>
   </div>
   <!---Sidebar Dinâmico-->
</div>

<!--End menu include -->
         </div>
         <!-- start dynamic content -->
         <div id="pageContent">
            

                     <div class="bookSimple">                
                        <a class="booktitle" href="ProductPage.php?isbn=1491914912"> Learning JavaScript: JavaScript Essentials for Modern Application Development </a> <br />
                  
                        <a href="ProductPage.php?isbn=1491914912"> 
                           <img class="Book" alt="Learning JavaScript: JavaScript Essentials for Modern Application Development" 
                              src="http://yorktown.cbe.wwu.edu/sandvig/mis314/assignments/bookstore/bookimages/1491914912.01.THUMBZZZ.jpg"> 
                        </a> 
                     
                        <p>This is an exciting time to learn JavaScript. Now that the latest JavaScript specification&#8212;ECMAScript 6.0 (ES6)&#8212;has been finalized, learning how to develop high-quality applications with this language is easier and more satisfying than 
                        <a href="ProductPage.php?isbn=1491914912">more...</a> 
                     </div>                  

	                     <div class="bookSimple">                
                        <a class="booktitle" href="ProductPage.php?isbn=059600916X"> Programming ASP.NET </a> <br />
                  
                        <a href="ProductPage.php?isbn=059600916X"> 
                           <img class="Book" alt="Programming ASP.NET" 
                              src="https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/059600916X.01.THUMBZZZ.jpg"> 
                        </a> 
                     
                        <p>Suitable for most any programmer who wants to master ASP.NET with an eye toward real-world development, <em>Programming ASP.NET</em> is an excellent resource that mixes good coverage of APIs with actual  programming techniques and advice using Vis 
                        <a href="ProductPage.php?isbn=059600916X">more...</a> 
                     </div>                  

	                     <div class="bookSimple">                
                        <a class="booktitle" href="ProductPage.php?isbn=0596528124"> Mastering Regular Expressions   </a> <br />
                  
                        <a href="ProductPage.php?isbn=0596528124"> 
                           <img class="Book" alt="Mastering Regular Expressions  " 
                              src="https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/0596528124.01.THUMBZZZ.jpg"> 
                        </a> 
                     
                        <p>Regular expressions are an extremely powerful tool for manipulating  text and data. They are now standard features in a wide range of  languages and popular tools, including Perl, Python, Ruby, Java, VB.NET  and C# (and any language using the .NET 
                        <a href="ProductPage.php?isbn=0596528124">more...</a> 
                     </div>                  

	      

         </div> 
         <!-- end dynamic content -->

         <!--Begin footer include -->
   @include('util.footer')

