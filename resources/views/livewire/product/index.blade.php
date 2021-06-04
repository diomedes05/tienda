
<div class="row">
    @foreach ($products as $product)
    <div class="col-sm-4 mb-2">
        <div class="card" style="width: 18rem;">
        <img src="{{ asset('storage/' .$product->thumbnail) }}" alt="" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title font-weight-bold"> {{ $product->price }} <sup> 00</sup></h5>
            <p><span>12 x articulo</span></p>
            <div class="d-flex justify-content-end">
                <button class="btn btn-outline-primary">Add to cart</button>
            </div>
        </div>
        </div>
    </div>
    @endforeach
</div>
