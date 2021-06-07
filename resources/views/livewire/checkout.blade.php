@extends('layouts.app')

@section('content')
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2>Resumen carrito</h2>
    <div class="row">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"> &times;</span>
                </button>
            </div>        
        @endif
        <div class="col-sm-7">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Acción</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ( $products as $product)
                                <tr>
                                    <th scope="row">{{ $product->id }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td >
                                        {{-- <button class="btn btn-outline-primary" wire:click="addToCart('{{ $product->slug }}')">Add to cart</button> --}}
                                        <button class="btn btn-danger" wire:click="deleteProduct('{{ $product->pivot->id }}')">
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        
                        <tr>
                            <th scope="row"></th>
                            <td class="font-weight-bold">Precio Total:</td>
                            <td class="font-weight-bold">{{ $products->sum('price') }}</td>
                            <th scope="row"></th>
                        </tr>
                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="card">
                <div class="card-body">
                    @include('stripe.stripe')
                </div>
            </div>
        </div>        
    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe("{{$stripeKey}}");

    var elements = stripe.elements();
    var cardElement = elements.create('card');

    cardElement.mount('#card-element');

    cardElement.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event){
        event.preventDefault();

        stripe.createToken(cardElement).then(function(result){
            if (result.error){
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                stripeTokenHandler(result.token);
            }
        })
    })

    function stripeTokenHandler(token){

        var form = document.getElementById('payment-form');

        var hiddenInput = document.createElement('input');

        hiddenInput.setAttribute('type','hidden');
        hiddenInput.setAttribute('name','stripeToken');
        hiddenInput.setAttribute('value',token.id);

        form.appendChild(hiddenInput);

        form.submit();

    }
</script>
@endpush
