<div class="container">
    <br>
    <div class="card">
        <div class="card-body">
            <div class="row mt-4">
                <div class="col-sm-7">
                    <div class="card">
                        <div class="card-body text-center">
                            <img src="" alt="" class="img-fluid">
                            <p class="mt-4">
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>
                </div>
        
                <div class="col-sm-5">
                    <div class="card">
                        <div class="card-body">
                            <p>Nuevo - 3402 vendidos</p>
                            <h2>{{ $product->name }}</h2>
                            <h1 class="mt-3">{{ $product->price }} <sup>.99</sup></h1>
        
                            <div class="text-rigth">
                                <button wire:click="addToCart('{{ $product->slug }}')" class="btn btn-outline-primary btn-block" >Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
        
            </div>
        </div>
    </div>
   
</div>
