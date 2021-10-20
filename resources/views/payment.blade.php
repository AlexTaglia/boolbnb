<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Payment</title>
  <!-- includes the Braintree JS client SDK -->
  <script src="https://js.braintreegateway.com/web/dropin/1.32.0/js/dropin.min.js"></script>

  <!-- includes jQuery -->
  <script src="http://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

  <div class="container">
       <div class="row justify-content-center">
       <div class="col-md-8 col-md-offset-2">
         <div id="dropin-container"></div>
         <button class="btn btn-success" id="submit-button">Esegui pagamento</button>
         <a href="{{route('apartment.show', $apartmentdId)}}">
           <button class="btn btn-primary">
             Torna all'appartamento
           </button>
         </a>
       </div>
     </div>
  </div>


  <script>

  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    var button = document.querySelector('#submit-button');

    braintree.dropin.create({
      authorization: "sandbox_cshvt9w5_nwkdc5xn7xkycskw",
      container: '#dropin-container'
    }, function (createErr, instance) {
      button.addEventListener('click', function () {
        instance.requestPaymentMethod(function (err, payload) {
          $.post('{{ route('payment.subscribe', [$id, $apartmentdId]) }}', {payload}, function (response) {
            if (response.success) {
              alert('Payment successfull!');
            } else {
              alert('Payment failed');
            }
          }, 'json');
        });
      });
    });
  </script>
</body>
</html>