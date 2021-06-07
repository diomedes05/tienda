
<div class="container">
  <br>
  <div class="card">
    <div class="card-body">
      <h2 class="text-center">Agregar producto </h2>
      <div class="row justify-content-center">
          <div class="col-sm-6">
              <form  wire:submit.prevent="save"  action="" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" wire:model="name" placeholder="Enter Name">
                    {{-- <span>{{ $name }}</span> --}}
                    @error('name')
                      <p class="error mb-2" > {{ $message }}  </p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="file" class="form-control" id="description" wire:model="description" placeholder="Enter Description" rows="3"> </textarea>
                    @error('description')
                      <p class="error mb-2" > {{ $message }}  </p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" wire:model="price" placeholder="Enter Price">
                    @error('price')
                      <p class="error mb-2" > {{ $message }}  </p>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="description">Thumbnail</label>
                    <input type="file" class="form-control" id="thumbnail" wire:model="thumbnail">
                    @error('thumbnail')
                      <p class="error mb-2" > {{ $message }}  </p>
                    @enderror
                    @if($thumbnail ?? '')
                      {{$name}}
                          {{-- <img src="{{ $thumbnail ?? ''->temporaryurl() }}" class="img-fluid mb-2"> --}}
                    @endif
                  </div>
                  <button wire:click.prevent="save()" type="button" class="btn btn-primary">Guardar producto</button>
                </form>
          </div>
      </div>
    </div>
  </div>
   
</div>
