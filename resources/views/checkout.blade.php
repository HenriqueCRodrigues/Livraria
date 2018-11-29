@include('util.header')
<!--End header include -->

<div id="pageContainer">
    <!-- start content -->
    <div id="checkoutContent">

        <div class="pageTitle">Your Account</div>
        <p class="pageTitle2">Buying online is quick and easy!</p>
        <p class="pageTitle2">
            Your cart is empty.</p>
        <form method="post" action="{{route('informarDados')}}" autocomplete="on" class="myForm">
            @csrf
            <div class="cartIcons">
                <div class="formGroup">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" autofocus required placeholder="Email"/>
                </div>
                <div class="formGroup">
                    <label>
                    </label>
                    <input type="image" src="/img/proceed-to-checkout.gif" alt="Proceed to checkout" class="inputImage"/>
                </div>
            </div>
        </form>

    </div>
    <!-- end content -->

    <!--Begin footer include -->
@include('util.footer')
