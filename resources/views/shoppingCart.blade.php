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
            </div>

            @include('util.sidebar', ['categories'])
        </div>

        <!--End menu include -->
    </div>
    <!-- start dynamic content -->
    <div id="pageContent">

        <!-- start page content *************** -->


        <p class="pageTitle2"> {{$qtyAll}} items in your cart </p>
        @if($qtyAll)
            <table id="cart">
                <tbody>
                <tr>
                    <th>Title</th>

                    <th>Qty</th>

                    <th>Price</th>

                    <th>Total</th>

                    <th></th>

                </tr>
                @foreach($carts as $cart)
                    <tr>
                        <td><a class="booktitle" target="_blank" href="{{route('exibirLivro', ['ISBN' => $cart['ISBN']])}}">{{$cart['title']}}</a></td>
                        <td>
                            {{$cart['qty']}}
                        </td>
                        <td class="bookPrice">
                            ${{$cart['price']}}
                        </td>
                        <td class="bookPrice">
                            ${{$cart['total']}}
                        </td>
                        <td style="text-align:center">
                            <a href="{{route('carrinhoAdicionar', ['ISBN' => $cart['ISBN']])}}">Add</a><br>
                            <a href="{{route('carrinhoRemover', ['ISBN' => $cart['ISBN']])}}">Remove</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        <div class="cartIcons">
            <a href="{{route('inicio')}}"> <img border="0" src="/img/continue-shopping.gif" width="121" height="19"
                                      alt="Continue shopping"/></a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="{{route('procederCompra')}}"> <img border="0" src="/img/proceed-to-checkout.gif" width="183" height="31"
                                         alt="Proceed to checkout"></a>
        </div>


        <p id="shipping">* Shipping is $3.49 for the first book and $.99 for each additional book. To assure
            reliable delivery and to keep your costs low we send all books via UPS ground. </p>


        <!-- end page content *************** -->
    </div>
    <!-- end dynamic content -->

    <!--Begin footer include -->
    @include('util.footer')
</div>