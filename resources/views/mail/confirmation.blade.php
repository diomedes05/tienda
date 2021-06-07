<h1>Hola {{$order->name}}</h1>
<h2>Confirmacion del producto</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="row">Id</th>
            <th > Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->shoppingCart->products as $item)
            <tr>
                <td scope="row">{{$item->id}}</td>
                <td > {{$item->name}}</td>
            </tr>
        @endforeach
        <tr>
            <td scope="row">{{$item->id}}</td>
            <td > {{$item->name}}</td>
        </tr>    
      </tbody>
</table>

@isset($url)

    <h2>Para completar tu order, completa el siguente formulario</h2>
    <a href="{{$url}}">Formulario</a>
@endisset