@include('util.header')

<!--End header include -->

<div id="pageContainer">
    <div id="leftColumn">
        <!--Begin menu include -->

        <div class="menuContainer">
            <div class="menuSearch">
                <div class="menuHead">
                    Search
                </div>
                @include('util.searchForm')

                @include('util.sidebar', ['categories'])

                <div class="menuBorder">
                    <form method="POST" action="{{route('buscarLivros')}}">
                        @csrf
                        <input type="text" name="search" autofocus/>
                        <input type="submit" value="Search" class="button fullWidth"/>
                    </form>
                </div>
            </div>
            <!---Sidebar Dinâmico-->
        </div>

        <!--End menu include -->
    </div>
    <!-- start dynamic content -->
    <div id="pageContent">

        @foreach($randomBooks as $book)
            <div class="bookSimple">
                <a class="booktitle" href="{{route('exibirLivro', ['ISBN' => $book->ISBN])}}"> {{ $book->title }} </a> <br/>

                <a href="{{route('exibirLivro', ['ISBN' => $book->ISBN])}}">
                    <img class="Book" alt="{{ $book->title }}"
                         src="http://yorktown.cbe.wwu.edu/sandvig/mis314/assignments/bookstore/bookimages/{{ $book->ISBN }}.01.THUMBZZZ.jpg">
                </a>

                <p>{!! str_limit($book->description, 200, '...') !!} <a href="{{route('exibirLivro', ['ISBN' => $book->ISBN])}}">more...</a>
            </div>
        @endforeach

    </div>
    <!-- end dynamic content -->

    <!--Begin footer include -->
@include('util.footer')
