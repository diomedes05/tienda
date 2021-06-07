
<div class="container">    
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"> &times;</span>
            </button>
        </div>        
    @endif

    <div class="container">
        <br>
        <div class="">
            <h2 class="text-center">Productos </h2>
            @foreach ($products as $product)
                <div class="col-sm-4 mb-3">
                    <div class="card" >
                        <a href="{{ route('product.show', ['productSlug'=>$product->slug]) }}">
                            <img src="{{ asset(Storage::url($product->thumbnail) )}}" alt="" class="card-img-top" width="50px;">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold"> {{ $product->price }} <sup> .99</sup></h5>
                            <p><span>{{ $product->name }}</span></p>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-outline-primary" wire:click="addToCart('{{ $product->slug }}')">Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
