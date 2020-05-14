@extends('layouts.app')

@section('content')
<div class="container">
 
   <form action="/p" enctype="multipart/form-data" method="post">
   @csrf
    <div class="row">
        <div class="col-8 offset-2">
    
            <div class="row"><h1>Add new Accomodation</h1></div>
            <div class="form-group row">
                      <label for="caption" class="col-md-4 col-form-label">Title</label>
                           
                        <input id="caption" 
                        type="text" 
                        class="form-control @error('caption') is-invalid @enderror" 
                        name="caption"
                        value="{{ old('caption') ?? 'The most unique flat ever!' }}"  autofocus>

                        @error('caption')
                                <strong>{{ $message }}</strong>
                      @enderror
                  </div>
                



                  <div class="form-group row">
                      <label for="type" class="col-md-4 col-form-label">Type</label>
                           
                        <input id="type" 
                        type="text" 
                        class="form-control @error('type') is-invalid @enderror" 
                        name="type"
                        value="{{ old('type') ?? 'room, flat...' }}"  autofocus>

                        @error('type')
                                <strong>{{ $message }}</strong>
                      @enderror
                  </div>

                  <div class="form-group row">
                      <label for="ubication" class="col-md-4 col-form-label">Adress</label>
                           
                        <input id="ubication" 
                        type="text" 
                        class="form-control @error('ubication') is-invalid @enderror" 
                        name="ubication"
                        value="{{ old('ubication') ?? 'Zaragoza, Spain' }}"  autofocus>

                        @error('ubication')
                                <strong>{{ $message }}</strong>
                      @enderror
                  </div>

                  <div class="form-group row">
                      <label for="description" class="col-md-4 col-form-label">Description</label>
                           
                        <input id="description" 
                        type="text" 
                        class="form-control @error('description') is-invalid @enderror" 
                        name="description"
                        value="{{ old('description') ?? 'Small and confy place to take a rest from your adventures' }}"  autofocus>

                        @error('description')
                                <strong>{{ $message }}</strong>
                      @enderror
                  </div>

                  <div class="form-group row">
                      <label for="prize" class="col-md-12 col-form-label">€ per Night</label>
                           
                        <input id="prize" style="width: 80px"
                        type="text" 
                        class="form-control @error('prize') is-invalid @enderror" 
                        name="prize"
                        value="{{ old('prize') ?? '20'}}"  autofocus> 

                        @error('prize')
                                <strong>{{ $message }}</strong>
                      @enderror
                  </div>

                    <div class="row">

                        <label for="image" class="col-md-4 col-form-label">Accomodation Image</label>
                        <input type="file", class="form-control-file" id="image" name="image">
                        @error('image')
                              
                                    <strong>{{ $message }}</strong>
                       
                        @enderror

                    </div>


                    <div class="row pt-4">
                    <button class="btn btn-primary">Add new Place</button>
                    </div>

              </div>
        </div>
     </div>
   </form>
</div>
@endsection
