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
   </div>

      @include('util.sidebar', ['categories'])
</div>

<!--End menu include -->
         </div>
         <!-- start dynamic content -->
         <div id="pageContent">

<!-- start page content *************** -->


   <div class="bookTitle"> {{$book->title}}  </div>

   <div class="authors">by
       @foreach($book->authors as $index => $author)
           <a href='{{route('buscarLivrosPorAuthor', ['id' => $author->AuthorID])}}'>{{$author->fullName}}</a>@if($index < count($book->authors)-1), @endif
       @endforeach
   </div>
   <a href="https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/{{$book->ISBN}}.01.LZZZZZZZ.jpg">
      <img class="Book" alt="{{$book->title}}  " title="{{$book->title}}  "
           src="https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/{{$book->ISBN}}.01.MZZZZZZZ.jpg">
   </a> <br />

   <div>
      <span class="priceLabel">List Price: </span>
      <span class="bookPriceList">${{$book->price}}</span>
   </div>

   <div>
      <span class="priceLabel">Our Price:</span>
      <span class="bookPriceB">${{ $book->discountValue }} </span>
   </div>

   <div>
      <span class="priceLabel">You Save:</span>
      <span class="bookPriceB">${{ $book->discount }} (20%)</span><br />
   </div>
   
   <a href="{{route('carrinhoAdicionar', ['ISBN' => $book->ISBN])}}">
      <img class="addToCart" src="/img/add-cart.png" width="120" height="40"
           alt="Add to cart" title="Add to cart" ></a>

   <div class="bookDetails">
      <div> <b>ISBN:</b> {{$book->ISBN}} </div>
      <div> <b>Publisher:</b>{{$book->publisher}}</div>
      <div>  <b>Pages:</b> {{$book->pages}}</div>
      <div> <b>Edition:</b> {{$book->edition}}</div>
   </div>

   <div class="bookDescription">
      {!! $book->description !!}
   </div>
   <a href="{{route('carrinhoAdicionar', ['ISBN' => $book->ISBN])}}">
   <img class="addToCart" src="/img/add-cart.png" width="120" height="40"
           alt="Add to cart" title="Add to cart" ></a>

<!-- end page content *************** -->
         </div>
         <!-- end dynamic content -->

         <!--Begin footer include -->
         @include('util.footer')
      </div>

