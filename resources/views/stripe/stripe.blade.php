<form action = "{{route('stripe.checkout')}}" method="post" id="payment-form">
    @csrf
    <div class="form-row">
        <div id="card-element" style = "width: 100%;" require>
        </div>
        <div id="card-errors" role="alert">
        </div>     
    </div>

    <div id="text-right" role="alert">
        <button  class="btn mt-2 btn-outline-primary">Comprar</button>
    </div>
    
</form>