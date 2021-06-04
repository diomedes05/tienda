
<div>
    <h2 class="text-center">Agregar nuevos productos </h2>
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <form  wire:submit.prevent="save"  action="" >
                {{-- <form > --}}
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
                      {{-- <input type="text" class="form-control" id="description" wire:model="description" placeholder="Enter Description"> --}}
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
                            <img src="{{ $thumbnail ?? ''->temporaryurl() }}" class="img-fluid mb-2">
                      @endif
                    </div>
                    <button wire:click.prevent="save()" type="button" class="btn btn-primary">Save product</button>
                    {{-- <button wire:click="save()"type="submit" class="btn btn-primary">Save product</button> --}}

                  </form>

                {{-- <button type="submit" class="btn btn-outline-primary btn-block" >Save product</button> --}}
            {{-- </form> --}}
        </div>
    </div>
</div>
