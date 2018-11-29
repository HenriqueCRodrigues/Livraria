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


        @if($qtyAll)
            <p class="pageTitle2"> {{$qtyAll}} items in your cart </p>
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
        @else
            <p class="pageTitle2"> 0 items in your cart </p>
        @endif

        <div class="cartIcons">
            <a href="{{route('inicio')}}"> <img border="0" src="/img/continue-shopping.gif" width="121" height="19"
                                                alt="Continue shopping"/></a>&nbsp;&nbsp;
            @if($qtyAll)
                &nbsp;&nbsp;
                <a href="{{route('procederCompra')}}"> <img border="0" src="/img/proceed-to-checkout.gif" width="183" height="31"
                                                            alt="Proceed to checkout"></a>
            @endif
        </div>


        <!-- end page content *************** -->
    </div>
    <!-- end dynamic content -->

    <!--Begin footer include -->
    @include('util.footer')
</div>
