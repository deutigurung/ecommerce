@extends('fronts.master')
@section('title') Ecommerce @stop
@section('content')
    <div class="content">
        <form action="your-server-side-code" method="POST">
            <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_test_ZdlkEtSDaOboCNDC7bD6XHmd"
                    data-amount="999"
                    data-name="Demo Site"
                    data-description="Widget"
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                    data-locale="auto">
            </script>
        </form>
    </div>
    @stop