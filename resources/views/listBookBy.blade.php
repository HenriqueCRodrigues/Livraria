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
          @foreach($categories as $category)
              <a href='{{route('buscarLivrosPorCategoria', ['id' => $category->CategoryID, 'name' => $category->CategoryName])}}' class='menuitem'>{{$category->CategoryName}}</a><br />
          @endforeach
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

                             <a class="booktitle" href="{{route('exibirLivro', ['ISBN' => $book->ISBN])}}">  {{$book->title}} </a>
                             <br />
                             <span class="authors">by
                                 @foreach($book->authors as $index => $author)
                                    <a href='{{route('buscarLivrosPorAuthor', ['id' => $author->AuthorID])}}'>{{$author->fullName}}</a>@if($index < count($book->authors)-1), @endif
                                 @endforeach
                             </span><br />
                             <a href="{{route('exibirLivro', ['ISBN' => $book->ISBN])}}">
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

