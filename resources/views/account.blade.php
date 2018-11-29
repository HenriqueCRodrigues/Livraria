@include('util.header')

<div id="pageContainer">
    <div id="pageContent" style="background-color: #fff; width: 97.5%">

        @if(isset($customer))
            @php($total = 0)
            @php($qty = 0)
            <center><a href="{{ route('logout') }}">Logout</a></center>
            @foreach($customer->orders as $order)
                @php($totalOrder = 0)
                <div style="border: 2px solid red; margin: 20px 10px; padding: 10px;">
                    @foreach($order->items as $item)
                        @php($totalOrder += $item->total)
                        @php($total += $item->total)
                        @php($qty += $item->qty)
                        <div class="bookSimple">
                            <a class="booktitle" href="{{route('exibirLivro', ['ISBN' => $item->book->ISBN])}}"> {{ $item->book->title }} </a> <br/>

                            <a href="{{route('exibirLivro', ['ISBN' => $item->book->ISBN])}}">
                                <img class="Book" alt="{{ $item->book->title }}"
                                     src="http://yorktown.cbe.wwu.edu/sandvig/mis314/assignments/bookstore/bookimages/{{ $item->book->ISBN }}.01.THUMBZZZ.jpg">
                            </a>

                            <p>{!! str_limit($item->book->description, 200, '...') !!} <a href="{{route('exibirLivro', ['ISBN' => $item->book->ISBN])}}">more...</a>
                                <br><br>
                            <div>
                                <span class="priceLabel"><b>Price:</b></span>
                                <span class="bookPriceB">${{$item->price}}</span> -
                                <span class="priceLabel"><b>Qty:</b></span>
                                <span class="bookPriceB">{{$item->qty}}</span> -
                                <span class="priceLabel"><b>Total price:</b></span>
                                <span class="bookPriceB">${{$item->total}}</span>
                                <br>
                            </div>
                        </div>
                    @endforeach

                    <hr>
                    <span class="priceLabel"><b>Total price:</b></span>
                    <span class="bookPriceB">${{ $totalOrder }}</span>
                </div>
            @endforeach
            <div id="pageContent" style="background-color: #fff; width: 97.5%">
                <span class="priceLabel"><b>Qty Total:</b></span>
                <span class="bookPriceB">{{ $qty }}</span>
                <br>
                <span class="priceLabel"><b>Price Total:</b></span>
                <span class="bookPriceB">${{ $total }}</span>
                <br>
            </div>
        @else
            <form method="post" action="{{route('login')}}" autocomplete="on" class="myForm">
                @csrf
                <div class="cartIcons">
                    <div class="formGroup">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" autofocus required placeholder="Email"/>
                    </div>
                    <div class="formGroup">
                        <button type="submit">Login</button>
                    </div>
                </div>
            </form>
        @endif

    </div>
</div>

@include('util.footer')
