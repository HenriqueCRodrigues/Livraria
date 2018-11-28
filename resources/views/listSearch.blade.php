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


                    <div class="pageTitle2">
                    {{count($books)}} livros encontrados <font color='#CC0000'>{{$valueRequest}}</font>
                    </div><br />

                    @foreach ($books as $book)
                         <div class="bookSimple">

                             <a class="booktitle" href="ProductPage.php?isbn=1491918667">  {{$book->title}} </a>
                             <br />
                             <span class="authors">by <a href='SearchBrowse.php?search=Nixon'>AUTHOR</a></span><br />
                             <a href="ProductPage.php?isbn=1491918667">
                                 <img class="Book" src="https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/{{$book->ISBN}}.01.THUMBZZZ.jpg">
                             </a>

                             <p>@if(strlen($book->description) > 235) {!!  substr($book->description , 0, 235)!!} @else {!! $book->description !!} @endif<a href="{{route('exibirLivro', ['ISBN' => $book->ISBN])}}">Ver Mais...</a>
                         </div>
                    @endforeach

<!-- end page content *************** -->

         </div> 
         <!-- end dynamic content -->

         <!--Begin footer include -->
@include('util.footer')

</div>

