@include('util.header')

<div id="pageContainer">
    <div id="pageContent" style="background-color: #fff; width: 97.5%">

        @foreach($customer->orders as $order)
            <div style="border: 2px solid red; margin: 20px 10px; padding: 10px;">
                @foreach($order->items as $item)
                    <div class="bookSimple">
                        <a class="booktitle" href="{{route('exibirLivro', ['ISBN' => $item->book->ISBN])}}"> {{ $item->book->title }} </a> <br/>

                        <a href="{{route('exibirLivro', ['ISBN' => $item->book->ISBN])}}">
                            <img class="Book" alt="{{ $item->book->title }}"
                                 src="http://yorktown.cbe.wwu.edu/sandvig/mis314/assignments/bookstore/bookimages/{{ $item->book->ISBN }}.01.THUMBZZZ.jpg">
                        </a>

                        <p>{!! str_limit($item->book->description, 200, '...') !!} <a href="{{route('exibirLivro', ['ISBN' => $item->book->ISBN])}}">more...</a>
                    </div>
                @endforeach
            </div>
        @endforeach

    </div>
</div>

@include('util.footer')
