@extends('frontend.body.app')
@section('content')
@section('title')
    Stripe
@endsection
    <style>
        /**
     * The CSS shown here will not be introduced in the Quickstart guide, but shows
     * how you can use CSS to style your Element's container.
     */
        .StripeElement {
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }
        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }
        .StripeElement--invalid {
            border-color: #fa755a;
        }
        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;}
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-6 shadow-lg" style="margin-top: 200px;">
                <div class="card">
                    <div class="card-header">
                        <h2>Donation Information</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">First Name :{{ $data['first_name'] }}</li>
                            <li class="list-group-item">Last Name: {{ $data['last_name'] }}</li>
                            <li class="list-group-item">Email: {{ $data['email'] }}</li>
                            <li class="list-group-item">Country: {{ $data['country'] }}</li>
                            <li class="list-group-item">Occupation: {{ $data['occupation'] }}</li>
                            <li class="list-group-item">Phone: {{ $data['phone'] }}</li>
                            <li class="list-group-item">Total Amount: {{ $data['donate'] }} $</li>
                        </ul>


                    </div>
                </div>
            </div>
            <div class="col-md-6" style="margin-top: 250px;">
                <form action="{{ route('stripe.store') }}" method="post" id="payment-form">
                    @csrf
                    <div class="form-row">
                        <label for="card-element">
                            Credit or debit card

                            <input name="donate" type="hidden" value="{{ $data['donate'] }}">
                            <input name="first_name" type="hidden" value="{{ $data['first_name'] }}">
                            <input name="last_name" type="hidden" value="{{ $data['last_name'] }}">
                            <input name="address" type="hidden" value="{{ $data['address'] }}">
                            <input name="adress_op" type="hidden" value="{{ $data['adress_op'] }}">
                            <input name="phone" type="hidden" value="{{ $data['phone'] }}">
                            <input name="city" type="hidden" value="{{ $data['city'] }}">
                            <input name="employer" type="hidden" value="{{ $data['employer'] }}">
                            <input name="country" type="hidden" value="{{ $data['country'] }}">
                            <input name="occupation" type="hidden" value="{{ $data['occupation'] }}">
                            <input name="state" type="hidden" value="{{ $data['state'] }}">
                            <input name="email" type="hidden" value="{{ $data['email'] }}">
                            <input name="postal" type="hidden" value="{{ $data['postal'] }}">


                        </label>

                        <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>
                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                    <br>
                    <button class="btn btn-primary">Submit Payment</button>
                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        // Create a Stripe client.
        var stripe = Stripe('pk_test_51JQXKXEeQL3aThfwpigQgZyaM0KqiPJcQ0EABriAvfpt6zjbbNbDVMW8qY9WryilJ5vaY2ya84dX8iozki4A4XSJ00qkRppikB');
        // Create an instance of Elements.
        var elements = stripe.elements();
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});
        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');
        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });
        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            // Submit the form
            form.submit();
        }
    </script>








@endsection