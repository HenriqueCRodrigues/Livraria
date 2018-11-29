@include('util.header')
<!--End header include -->

<div id="pageContainer">
    <!-- start content -->
    <div id="checkoutContent">

        <!-- start page content *************** -->


        <div class="pageTitle">Shipping Information</div>

        <p class='centeredNotice'>Please provide your shipping address.</p><br>
        <form method="post" action="{{route('finalizarCompra')}}" autocomplete="on" class="myForm">
            @csrf

            <div class="formGroup">
                <label for="email">
                    Email: </label>

                <input type="email" name="email" value="{{ $customer->email }}" required placeholder="Enter Email" maxlength="50"/>
            </div>

            <div class="formGroup">
                <label for="fname">
                    First name: </label>
                <input type="text" name="fname" value="{{ $customer->fname }}" autofocus required
                       placeholder="First name" title="first name" maxlength="20" pattern="[A-Za-z'-]{2,20}"/>
            </div>
            <div class="formGroup">
                <label for="lname">
                    Last name: </label>
                <input type="text" name="lname" value="{{ $customer->lname }}" required
                       placeholder="Last name" title="last name" maxlength="20" pattern="[A-Za-z'-]{2,20}"/>
            </div>
            <div class="formGroup">
                <label for="street">
                    Street: </label>
                <input type="text" name="street" value="{{ $customer->street }}" required
                       placeholder="Street address" title="street address" maxlength="25"/>
            </div>
            <div class="formGroup">
                <label for="city">
                    City:</label>
                <input type="text" name="city" value="{{ $customer->city }}" required
                       placeholder="City" title="city" maxlength="30"/>
            </div>
            <div class="formGroup">
                <label for="state">
                    State:</label>
                <td>
                    <input type="text" name="state" style="width:40px" value="{{ $customer->state }}" required
                           placeholder="ST" title="2-character state abbreviation" max length="2" pattern="[A-Za-z]{2}"/>
            </div>
            <div class="formGroup">
                <label for="zip">
                    Zip: </label>
                <input type="text" name="zip" style="width:80px;" value="{{ $customer->zip }}" required
                       placeholder="Zip" title="zip" maxlength="8" pattern="[0-9]{8}"/>
            </div>
            <div class="formGroup">
                <label></label>

                <input type="hidden" name="custID" value="{{ $customer->custID }}">
                <input class="inputImage" type="image" src="/img/buy-now.gif">
            </div>
        </form>
        <br>

        <!-- end page content *************** -->
    </div>
    <!-- end content -->

    <!--Begin footer include -->
@include('util.footer')
